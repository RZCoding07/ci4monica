<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Michalsn\CodeIgniterHtmx\HTTP\IncomingRequest as HtmxRequest;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['form', 'url', 'html', 'text', 'date', 'number'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */


    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);


        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    protected function getTable(array $config = [], $length = 0): string
    {
        $csrfHash = csrf_hash();
        $csrfToken = csrf_token();
        $defaultConfig = [
            'processing' => true,
            'serverSide' => true,
            "scrollY" => '50dvh',
            'responsive' => false,
            "scrollX" => true,
            "scrollCollapse" => false,
            "scroller" => true,
            'width' => '100%',
            'async' => true,
            'ajax' => [
                'url' => $config['url'] ?? '',
                'type' => 'POST',
                'dataType' => 'json',
                'data' => [
                   '["'. $csrfToken .'"]' => $csrfHash,
                ],
                'async' => true
            ],
            'dom' => $config['dom'] ?? 'Bfrti',
            'buttons' => $this->getDataTableButtons(),
            'searching' => $config['searching'] ?? true,
            'pageLength' => $config['pageLength'] ?? 1000,
            'select' => $config['select'] ?? false,
            'lengthChange' => $config['lengthChange'] ?? false,
            'language' => $config['language'] ?? [
                'paginate' => [
                    'next' => '<i class="fa-solid fa-angle-right"></i>',
                    'previous' => '<i class="fa-solid fa-angle-left"></i>',
                ],
            ],
        ];

        return json_encode($defaultConfig);
    }

    protected function getDataTableButtons(): array
    {
        return [
            [
                'extend' => 'excel',
                'text' => '<i class="fa-solid fa-file-excel"></i> Excel',
                'className' => 'btn btn-sm bg-primary text-white border-0 shadow-none rounded'
            ],
            [
                'extend' => 'pdf',
                'text' => '<i class="fa-solid fa-file-pdf"></i> PDF',
                'className' => 'btn btn-sm bg-primary text-white border-0 shadow-none rounded'
            ],
            [
                'extend' => 'copy',
                'text' => '<i class="fa-solid fa-copy"></i> Salin',
                'className' => 'btn btn-sm bg-primary text-white border-0 shadow-none rounded'
            ],
        ];
    }

    protected function getView($data, HtmxRequest $request, $page = 'components/table')
    {
        $data['title_web'] = $this->title($data['title']) ?? '';
        return view($request->isHtmx() ? $page : 'layouts/master_app', ['content' => view($page, $data)]);
    }

    protected function title(string $title): string
    {
        return view('components/title', ['title' => $title]);
    }

    protected function excelDateToPHPDate($excelDate)
    {
        $unixDate = ($excelDate - 25569) * 86400;
        return gmdate("Y-m-d", $unixDate);
    }

    public function  jsoner($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}
