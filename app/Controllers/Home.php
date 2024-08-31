<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        /** @var IncomingRequest $response */
        $request = service('IncomingRequest');
        $data = [
            'title' => 'Dashboard'
        ];
        return $this->getView($data, $request, 'dashboard');
    }

    public function error503()
    {
        return view('errors/html/error_503');
    }
}
