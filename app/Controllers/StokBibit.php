<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StoklokasipervarModel;
use Hermawan\DataTables\DataTable;

class StokBibit extends BaseController
{
    protected $controller = 'StokBibit';
    protected $title = 'Stok Bibit';
    protected $model;

    public function __construct()
    {
        $this->model = new StoklokasipervarModel();
    }

    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,

            'thead' => ['No', 'Regional' , 'Kebun', 'Varietas', 'Lokasi', 'Nursery Month 1', 'Nursery Month 2', 'Nursery Month 3', 'Nursery Month 4', 'Nursery Month 5', 'Nursery Month 6', 'Nursery Month 7', 'Nursery Month 8', 'Nursery Month 9', 'Nursery Month 10', 'Nursery Month 11', 'Nursery Month 12', 'Nursery Month 13', 'Nursery Month 14', 'Nursery Month 15', 'Nursery Month 16', 'Nursery Month 17', 'Nursery Month 18', 'Nursery Month 19', 'Nursery Month 20', 'Nursery Month 21', 'Nursery Month 22', 'Nursery Month 23', 'Nursery Month 24', 'Nursery Month 25', 'Nursery Month 26', 'Nursery Month 27', 'Nursery Month 28', 'Nursery Month 29', 'Nursery Month 30 Plus', 'Jumlah'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/tebel')])
        ];

        return $this->getView($data, $request);
    }


    public function tebel()
    {
        $builder = db_connect()->table('stok_lokasi_per_var')->select('regional, kebun, varietas, lokasi, nursery_month_1, nursery_month_2, nursery_month_3, nursery_month_4, nursery_month_5, nursery_month_6, nursery_month_7, nursery_month_8, nursery_month_9, nursery_month_10, nursery_month_11, nursery_month_12, nursery_month_13, nursery_month_14, nursery_month_15, nursery_month_16, nursery_month_17, nursery_month_18, nursery_month_19, nursery_month_20, nursery_month_21, nursery_month_22, nursery_month_23, nursery_month_24, nursery_month_25, nursery_month_26, nursery_month_27, nursery_month_28, nursery_month_29, nursery_month_30_plus, jumlah');
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
        $model = new StoklokasipervarModel();
        $dataToInsert = [];
        foreach ($mappedData as $data) {
	// protected $allowedFields = ['regional', 'varietas', 'lokasi', 'nursery_month_1', 'nursery_month_2', 'nursery_month_3', 'nursery_month_4', 'nursery_month_5', 'nursery_month_6', 'nursery_month_7', 'nursery_month_8', 'nursery_month_9', 'nursery_month_10', 'nursery_month_11', 'nursery_month_12', 'nursery_month_13', 'nursery_month_14', 'nursery_month_15', 'nursery_month_16', 'nursery_month_17', 'nursery_month_18', 'nursery_month_19', 'nursery_month_20', 'nursery_month_21', 'nursery_month_22', 'nursery_month_23', 'nursery_month_24', 'nursery_month_25', 'nursery_month_26', 'nursery_month_27', 'nursery_month_28', 'nursery_month_29', 'nursery_month_30_plus'];

            $dataToInsert[] = [
                'regional' => $data[0],
                'kebun' => $data[1],
                'varietas' => $data[2],
                'lokasi' => $data[3],
                'nursery_month_1' => $data[4],
                'nursery_month_2' => $data[5],
                'nursery_month_3' => $data[6],
                'nursery_month_4' => $data[7],
                'nursery_month_5' => $data[8],
                'nursery_month_6' => $data[9],
                'nursery_month_7' => $data[10],
                'nursery_month_8' => $data[11],
                'nursery_month_9' => $data[12],
                'nursery_month_10' => $data[13],
                'nursery_month_11' => $data[14],
                'nursery_month_12' => $data[15],
                'nursery_month_13' => $data[16],
                'nursery_month_14' => $data[17],
                'nursery_month_15' => $data[18],
                'nursery_month_16' => $data[19],
                'nursery_month_17' => $data[20],
                'nursery_month_18' => $data[21],
                'nursery_month_19' => $data[22],
                'nursery_month_20' => $data[23],
                'nursery_month_21' => $data[24],
                'nursery_month_22' => $data[25],
                'nursery_month_23' => $data[26],
                'nursery_month_24' => $data[27],
                'nursery_month_25' => $data[28],
                'nursery_month_26' => $data[29],
                'nursery_month_27' => $data[30],
                'nursery_month_28' => $data[31],
                'nursery_month_29' => $data[32],
                'nursery_month_30_plus' => $data[33]
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
