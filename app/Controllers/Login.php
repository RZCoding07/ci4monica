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

    public function __construct()
    {
        $this->users = new UsersModel();
        $this->pksModel = new PksModel();
        $this->regionalModel = new RegionalModel();
    }

    public function index()
    {
        return view('login');
    }
    public function ceklogin()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $monica_req = $this->request->getPost('req');
    
        session()->set('monica_req', $monica_req === 'offfarm' ? 'offfarm' : 'onfarm');
    
        $findUser = $this->users->where('username', $login)->first();
        if (!$findUser || !password_verify($password, $findUser->password)) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Login gagal!', 'status' => 'error']);
        }
    
        $db = \Config\Database::connect();
        $sessionData = [
            'id' => $findUser->id,
            'username' => $findUser->username,
            'nama' => $findUser->nama,
            'role' => $findUser->role,
            'isLogin' => true
        ];
    
        switch ($findUser->role) {
            case 'Admin Regional':
                $user_regional = $db->table('user_regional')->where('user_id', $findUser->id)->get()->getRow();
                $regional = $this->regionalModel->where('id', $user_regional->regional_id)->first();
                $sessionData = array_merge($sessionData, [
                    'regional_id' => $user_regional->regional_id,
                    'nama_regional' => $regional->fullname
                ]);
                break;
            
            case 'Admin PKS':
                $user_pks = $db->table('user_pks')->where('user_id', $findUser->id)->get()->getRow();
                $pks = $this->pksModel->where('id', $user_pks->pks_id)->first();
                $regional = $this->regionalModel->where('id', $pks->regional_id)->first();
                $sessionData = array_merge($sessionData, [
                    'pks_id' => $user_pks->pks_id,
                    'nama_pks' => $pks->nama_pks,
                    'regional_id' => $pks->regional_id,
                    'nama_regional' => $regional->fullname
                ]);
                break;
            
            case 'Manajer PKS':
                $user_pks = $db->table('manager_pks')->where('user_id', $findUser->id)->get()->getRow();
                $pks = $this->pksModel->where('id', $user_pks->pks_id)->first();
                $regional = $this->regionalModel->where('id', $pks->regional_id)->first();
                $sessionData = array_merge($sessionData, [
                    'pks_id' => $user_pks->pks_id,
                    'nama_pks' => $pks->nama_pks,
                    'regional_id' => $pks->regional_id,
                    'nama_regional' => $regional->fullname
                ]);
                break;
    
            case 'Superadmin':
            case 'Viewer':
                // No additional data needed for these roles
                break;
    
            default:
                return $this->response->setStatusCode(403)->setJSON(['message' => 'Role tidak dikenali!', 'status' => 'error']);
        }
    
        session()->set($sessionData);
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Login berhasil!', 'status' => 'success', 'redirect' => '/dashboard']);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    
    
}
