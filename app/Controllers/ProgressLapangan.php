<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProgressLapanganModel;

class ProgressLapangan extends BaseController
{
    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Progress Lapangan',
            'controller' => 'ProgressLapangan',
            'thead' => ['No', 'Kode', 'Unit', 'Parent', 'Nama Investasi', 'Progress Lapangan', 'Input Photo'],
            'tabel' => $this->getTable(['url' => base_url('progresslapangan/tableProgressLapangan')])
        ];

        return $this->getView($data, $request);
    }

    public function tableProgressLapangan()
    {
        $builder = db_connect()->table('progress_lapangan')->select('id, kode, unit, parent, nama_investasi, progress_lapangan, input_photo');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }

    public function add()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Progress Lapangan',
            'controller' => 'ProgressLapangan',
            'form'  => view('progress_lapangan/form'),
            'title_web' => 'Tambah Data Progress Lapangan'
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Progress Lapangan',
            'controller' => 'ProgressLapangan',
            'title_web' => 'Upload Data Progress Lapangan'
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
        $progressLapanganModel = new ProgressLapanganModel();

        foreach ($mappedData as $data) {
            $progressLapanganModel->insert([
                'kode' => $data[0],
                'unit' => $data[1],
                'parent' => $data[2],
                'nama_investasi' => $data[3],
                'progress_lapangan' => $data[4],
                'input_photo' => $data[5] ?? 'default.jpg'
            ]);
        }

        return $this->getResponse(
            ['message' => 'Chunk uploaded successfully'],
            ResponseInterface::HTTP_OK
        );
    }

    private function getResponse($data, $statusCode)
    {
        return $this->response->setJSON($data)->setStatusCode($statusCode);
    }
}
