<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Modelvendor;
use App\Models\Modeluser;
use App\Models\Modelcustomer;
use App\Models\Modelmarketing;
use App\Models\Modelmarketingproject;
use App\Models\Modelkepalaops;
use App\Models\Modeladmin;
use App\Models\Modelmonitoringcs;
use App\Models\Modelstaffops;
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
     * @var array
     */
    protected $helpers = ['form','url','custom'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
        $this->vend = new Modelvendor;
        $this->usr = new Modeluser;
        $this->cust = new Modelcustomer;
        $this->markt = new Modelmarketing;
        $this->markt_proj = new Modelmarketingproject;
        $this->kops = new Modelkepalaops;
        $this->adm = new Modeladmin;
        $this->moncs = new Modelmonitoringcs;
        $this->sops = new Modelstaffops;
    }
}
