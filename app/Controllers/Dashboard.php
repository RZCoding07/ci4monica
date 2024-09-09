<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SumberIpsModel;

class Dashboard extends BaseController
{
    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Dashboard',
            'p_pks' => (new SumberIpsModel())->where('nomor_ppab_pp !=', "")->countAll(),
            'p_tekpol' => (new SumberIpsModel())->where('nomor_pk !=',  "")->countAll(),
            'p_hps' => (new SumberIpsModel())->where('tgl_create_pk !=', "")->countAll(),
            'p_pengadaan' => (new SumberIpsModel())->where('tgl_submit_ke_pengadaan !=', "")->countAll()
        ];
        session()->set('data', $data);
        return $this->getView($data, $request, 'dashboard');
    }
}
