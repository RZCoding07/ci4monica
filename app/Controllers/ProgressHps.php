<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SumberIpsModel;

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
            'thead' => ['No', 'No. Rek', 'PKS', 'Regional', 'Uraian Tugas', 'Nomor PPAB/PP', 'Nomor PK', 'Tanggal Create PK', 'Progress Lapangan'],
            'tabel' => $this->getTable(['url' => base_url($this->controller . '/table')]),
        ];

        return $this->getView($data, $request);
    }

    public function table()
    {
        $columns = [
            'sumber_ips.id',
            'sumber_ips.kode',
            'sumber_ips.unit',
            'sumber_ips.parent',
            'sumber_ips.nama_investasi',
            'sumber_ips.nomor_ppab_pp',
            'sumber_ips.nomor_pk',
            'sumber_ips.tgl_create_pk',
            'progress_lapangan.progress_lapangan'
        ];

        $builder = (new SumberIpsModel())->select(implode(',', $columns))
            ->join('progress_lapangan', 'progress_lapangan.kode = sumber_ips.kode')
            ->where('sumber_ips.tgl_create_pk !=', '');
        return DataTable::of($builder)
            ->hide('id')
            ->hide('progress_lapangan')
            ->add('action', function ($value) {
                return '
                    <h6>Progress
                        <span class="pull-right">' . round($value->progress_lapangan * 100) . '%</span>
                    </h6>
                    <div class="progress ">
                        <div class="progress-bar bg-info progress-animated" style="height:8px; width: ' . $value->progress_lapangan * 100 . '%" role="progressbar" aria-valuenow="' . $value->progress_lapangan * 100 . '" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ';
            })
            ->addNumbering()
            ->toJson();
    }
}
