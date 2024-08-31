<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AwalModel;

class Awal extends BaseController
{
    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Awal',
            'controller' => 'Awal',
            'thead' => ['No', 'Kode', 'Tahun', 'Unit', 'Parent', 'Rekening Besar', 'Nama Investasi', 'Nilai Proyek Tahun Berjalan (RKAP)'],
            'tabel' => $this->getTable(['url' => base_url('awal/tableAwal')])
        ];

        return $this->getView($data, $request);
    }

    public function tableAwal()
    {
        $builder = db_connect()->table('awal')->select('id, kode, tahun, unit, parent, rekening_besar, nama_investasi, nilai_proyek_tahun_berjalan_rkap');
        return DataTable::of($builder)
        ->hide('id')
        ->hide('nilai_proyek_tahun_berjalan_rkap')
        ->addNumbering()
        ->add('action', function ($data) {
            return 'Rp. ' . number_format($data->nilai_proyek_tahun_berjalan_rkap, 0, ',', '.');
        })
        
        ->toJson();
    }

    public function add()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Awal',
            'controller' => 'Awal',
            'form'  => view('awal/form'),
            'title_web' => 'Tambah Data Awal'
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Awal',
            'controller' => 'Awal',
            'title_web' => 'Upload Data Awal'
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
        $awalModel = new AwalModel();
    
        $dataToInsert = [];
        foreach ($mappedData as $data) {
            $dataToInsert[] = [
                'kode' => $data[0],
                'tahun' => $data[1],
                'unit' => $data[2],
                'parent' => $data[3],
                'rekening_besar' => $data[4],
                'nama_investasi' => $data[5],
                'nilai_proyek_tahun_berjalan_rkap' => $data[6],
            ];
        }
    
        if ($awalModel->insertBatch($dataToInsert)) {
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
