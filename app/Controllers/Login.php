<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PksModel;
use App\Models\RegionalModel;
use App\Models\UsersModel;

use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest as HtmxRequest;


class Login extends BaseController
{
    protected $users;
    protected $pksModel;
    protected $regionalModel;

    public function index()
    {
        return view('login');
    }

    public function ceklogin()
    {
        
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $monica_req = $this->request->getPost('req');

        if ($monica_req == 'offfarm') {
            session()->set('monica_req', 'offfarm');
        } else {
            session()->set('monica_req', 'onfarm');
        }


        $findUser = $this->users->where('username', $login)->first();
        if (!$findUser || !password_verify((string)$password, $findUser->password)) {
            return $this->response->setJSON(array('message' => 'Username atau password salah!'));
        }
        $db = \Config\Database::connect();
        if ($findUser->role == 'Admin Regional') {
            $user_regional = $db->table('user_regional')->where('user_id', $findUser->id)->get()->getRow();
            $regional = $this->regionalModel->where('id', $user_regional->regional_id)->first();
            session()->set([
                'id' => $findUser->id,
                'username' => $findUser->username,
                'nama' => $findUser->nama,
                'role' => $findUser->role,
                'regional_id' => $user_regional->regional_id,
                'nama_regional' => $regional->fullname,
                'isLogin' => true
            ]);
        } else if ($findUser->role == 'Admin PKS') {
            $user_pks = $db->table('user_pks')->where('user_id', $findUser->id)->get()->getRow();
            $pks = $this->pksModel->where('id', $user_pks->pks_id)->first();
            $regional = $this->regionalModel->where('id', $pks->regional_id)->first();

            session()->set([
                'id' => $findUser->id,
                'username' => $findUser->username,
                'nama' => $findUser->nama,
                'role' => $findUser->role,
                'pks_id' => $user_pks->pks_id,
                'nama_pks' => $pks->nama_pks,
                'regional_id' => $pks->regional_id,
                'nama_regional' => $regional->fullname,
                'isLogin' => true
            ]);
        } else if ($findUser->role == 'Manajer PKS') {
            $user_pks = $db->table('manager_pks')->where('user_id', $findUser->id)->get()->getRow();
            $pks = $this->pksModel->where('id', $user_pks->pks_id)->first();
            $regional = $this->regionalModel->where('id', $pks->regional_id)->first();

            session()->set([
                'id' => $findUser->id,
                'username' => $findUser->username,
                'nama' => $findUser->nama,
                'role' => $findUser->role,
                'pks_id' => $user_pks->pks_id,
                'nama_pks' => $pks->nama_pks,
                'regional_id' => $pks->regional_id,
                'nama_regional' => $regional->fullname,
                'isLogin' => true
            ]);
        } else if ($findUser->role == 'Superadmin') {
            session()->set([
                'id' => $findUser->id,
                'username' => $findUser->username,
                'nama' => $findUser->nama,
                'role' => $findUser->role,
                'isLogin' => true
            ]);
        } else if ($findUser->role == 'Viewer') {
            session()->set([
                'id' => $findUser->id,
                'username' => $findUser->username,
                'nama' => $findUser->nama,
                'role' => $findUser->role,
                'isLogin' => true
            ]);
        } else {
            return $this->response->setJSON(array('message' => 'Anda tidak memiliki akses!'));
        }
        echo json_encode(array('message' => 'success'));
    }
}
