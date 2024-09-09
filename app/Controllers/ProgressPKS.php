<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AwalModel;

class ProgressPKS extends BaseController
{
    protected $controller = 'ProgressPKS';
    protected $title = 'Progress PKS';

    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'thead' => ['No', 'No. Rek', 'PKS', 'Regional', 'Uraian Tugas', 'Nomor PPAB/PP'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/table')]),
        ];

        return $this->getView($data, $request);
    }

    public function table()
    {
        $builder = db_connect()->table('sumber_ips')->select('id, kode, unit, parent, nama_investasi, nomor_ppab_pp')->where('nomor_ppab_pp !=', '');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }
}

