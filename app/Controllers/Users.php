<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Users',
            'controller' => 'Users',
            'thead' => ['No', 'Username', 'Fullname', 'Role'],
            'tabel' => $this->getTable(['url' => base_url('users/tebelUser')])
        ];

        return $this->getView($data, $request);
    }

    public function tebelUser()
    {
        $builder = db_connect()->table('users')->select('id, username, nama, role');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }

    public function add() 
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Users',
            'controller' => 'Users',
            'form'  => view('users/form'),
            'title_web' => 'Tambah Data Users'
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload() 
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Users',
            'controller' => 'Users',
            'title_web' => 'Upload Data Users'
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
        $userModel = new UsersModel();

        foreach ($mappedData as $data) {
            $userModel->insert([
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
