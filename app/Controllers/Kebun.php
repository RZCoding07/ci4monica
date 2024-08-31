<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KebunModel;

class Kebun extends BaseController
{
    protected $controller = 'Kebun';
    protected $title = 'Kebun';
    protected $model;

    public function __construct()
    {
        $this->model = new KebunModel();
    }

    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'thead' => ['No', 'Regional', 'Lokasi', 'PN', 'MN', 'Jumlah'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/tebel')])
        ];

        return $this->getView($data, $request);
    }


    public function tebel()
    {
        $builder = db_connect()->table('kebun')->select('regional, lokasi, pn, mn, jumlah, keterangan')->join('regional', 'regional.fullname = kebun.regional');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }

    public function add()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'form'  => view(strtolower($this->controller) . '/form'),
            'title_web' => 'Tambah Data ' . $this->controller
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'title_web' => 'Upload Data ' . $this->controller
        ];
        return $this->getView($data, $request, 'components/upload');
    }

    public function do_upload()
    {
        $request = $this->request->getJSON();

        if (!isset($request->mappedData)) {
            return $this->getResponse(
                ['message' => 'No data received'],
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }

        $mappedData = $request->mappedData;
        $model = new KebunModel();
        // kode', 'unit', 'parent', 'nama_investasi', 'nomor_ppab_pp', 'nomor_pk', 'tgl_create_pk', 'tgl_submit_ke_pengadaan', 'nomor_sppbj
        $dataToInsert = [];
        foreach ($mappedData as $data) {
            $dataToInsert[] = [
                'regional' => $data[0],
                'lokasi' => $data[1],
                'pn' => $data[2],
                'mn' => $data[3]
            ];
        }

        if ($model->insertBatch($dataToInsert)) {
            return $this->getResponse(
                ['message' => 'Chunk uploaded successfully'],
                ResponseInterface::HTTP_OK
            );
        } else {
            return $this->getResponse(
                ['message' => 'Failed to upload chunk'],
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    private function getResponse($data, $statusCode)
    {
        return $this->response->setJSON($data)->setStatusCode($statusCode);
    }
}
