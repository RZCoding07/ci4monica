<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PksModel;

class PKS extends BaseController
{
    protected $controller = 'PKS';
    protected $title = 'PKS';
    protected $model;

    public function __construct()
    {
        $this->model = new PksModel();
    }

    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'thead' => ['No', 'Nama PKS', 'Regional'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/tebel')])
        ];

        return $this->getView($data, $request);
    }


    public function tebel()
    {
        $builder = db_connect()->table('pks')->select('nama_pks, regional.fullname')->join('regional', 'regional.id = pks.regional_id');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }

    public function add()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller ,
            'form'  => view( strtolower($this->controller) . '/form'),
            'title_web' => 'Tambah Data ' . $this->controller 
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller ,
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

        foreach ($mappedData as $data) {
            $this->model->insert([
                'username' => $data->Username,
                'fullname' => $data->Fullname,
                'password' => password_hash($data->Password, PASSWORD_BCRYPT), // Hash the password
                'role'     => $data->Role,
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
