<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SumberIpsModel;

class SumberIps extends BaseController
{
    public function index()
    {
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Sumber IPS',
            'controller' => 'SumberIps',
            'thead' => ['No', 'Kode', 'Unit', 'Parent', 'Nama Investasi', 'Nomor PPAB/PP', 'Nomor PK', 'Tanggal Create PK', 'Tanggal Submit ke Pengadaan', 'Nomor SPPBJ'],
            'tabel' => $this->getTable(['url' => base_url('sumberips/tableSumberIps')])
        ];

        return $this->getView($data, $request);
    }

    public function tableSumberIps()
    {
        $builder = db_connect()->table('sumber_ips')->select('id, kode, unit, parent, nama_investasi, nomor_ppab_pp, nomor_pk, tgl_create_pk, tgl_submit_ke_pengadaan, nomor_sppbj');
        return DataTable::of($builder)->hide('id')->addNumbering()->toJson();
    }

    public function add()
    {
        $request = service('IncomingRequest');
        $data = [
            'controller' => 'SumberIps',
            'title' => 'Sumber IPS',
            'form'  => view('sumber_ips/form'),
            'title_web' => 'Tambah Data Sumber IPS'
        ];
        return $this->getView($data, $request, 'components/add');
    }

    public function upload()
    {
        $request = service('IncomingRequest');
        $data = [
            'controller' => 'SumberIps',
            'title' => 'Sumber IPS',
            'title_web' => 'Upload Data Sumber IPS'
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
        $sumberIpsModel = new SumberIpsModel();
        // kode', 'unit', 'parent', 'nama_investasi', 'nomor_ppab_pp', 'nomor_pk', 'tgl_create_pk', 'tgl_submit_ke_pengadaan', 'nomor_sppbj
        $dataToInsert = [];
        foreach ($mappedData as $data) {
            $dataToInsert[] = [
                'kode' => $data[0],
                'unit' => $data[1],
                'parent' => $data[2],
                'nama_investasi' => $data[3],
                'nomor_ppab_pp' => $data[4],
                'nomor_pk' => $data[5],
                'tgl_create_pk' => $this->excelDateToPHPDate($data[6]),
                'tgl_submit_ke_pengadaan' => $this->excelDateToPHPDate($data[7]),
                'nomor_sppbj' => $data[8]
            ];
        }
    
        if ($sumberIpsModel->insertBatch($dataToInsert)) {
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
