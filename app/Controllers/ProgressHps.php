<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AwalModel;

class ProgressHps extends BaseController
{
    protected $controller = 'ProgressHps';
    protected $title = 'Progress HPS';

    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'thead' => ['No', 'No. Rek', 'PKS', 'Regional', 'Uraian Tugas', 'Nomor PPAB/PP', 'Nomor PK', 'Tanggal Create PK'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/table')]),
            'regional' => (new AwalModel())->find((new AwalModel())->getInsertID() - 1)->parent
        ];

        return $this->getView($data, $request);
    }

    public function table()
    {
        $builder = db_connect()->table('sumber_ips')->select('id, kode, unit, parent, nama_investasi, nomor_ppab_pp, nomor_pk, tgl_create_pk')->where('tgl_create_pk !=', '');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }
}

