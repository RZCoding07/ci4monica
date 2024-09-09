<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AwalModel;

class ProgressPengadaan extends BaseController
{
    protected $controller = 'ProgressPengadaan';
    protected $title = 'Progress Pengadaan';

    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => $this->title,
            'controller' => $this->controller,
            'thead' => ['No', 'No. Rek', 'PKS', 'Regional', 'Uraian Tugas', 'Nomor PPAB/PP', 'Nomor PK', 'Tanggal Create PK', 'Tanggal Submit ke Pengadaan'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/table')]),
        ];

        return $this->getView($data, $request);
    }

    public function table()
    {
        $builder = db_connect()->table('sumber_ips')->select('id, kode, unit, parent, nama_investasi, nomor_ppab_pp, nomor_pk, tgl_create_pk, tgl_submit_ke_pengadaan')->where('tgl_submit_ke_pengadaan !=', '');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }
}

