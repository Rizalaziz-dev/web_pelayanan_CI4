<?php

namespace App\Controllers;

use App\Models\Back\Level_Model;
use App\Models\Back\User_Model;
use App\Models\Back\Sitara_Model;
use App\Models\Back\Login_Model;
use App\Models\Back\Case_Model;
use App\Models\Back\CaseDetail_Model;
use App\Models\Back\Suspect_Model;
use App\Models\Back\Decision_Model;
use App\Models\Back\Trial_Model;
use App\Models\Front\Tipikor_Model;
use App\Models\Front\Status_Model;
use App\Models\Front\Wbs_Model;
use App\Models\Front\Reporter_Model;
use App\Models\Front\Yankum_Model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Predis\Response\Status;
use Psr\Log\LoggerInterface;

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

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url', 'download'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: 

		$this->session = \Config\Services::session();

		$this->db      = \Config\Database::connect();

		//Back

		$this->usr = new User_Model;

		$this->sitara = new Sitara_Model;

		$this->login = new Login_Model;

		$this->lvl = new Level_Model;

		$this->case = new Case_Model;

		$this->csdet = new CaseDetail_Model;

		$this->sspct = new Suspect_Model;

		$this->dcsn = new Decision_Model;

		$this->trial = new Trial_Model;

		//Front

		$this->status = new Status_Model;

		$this->tpkr = new Tipikor_Model;

		$this->wbs = new Wbs_Model;

		$this->rprtr = new Reporter_Model;

		$this->yankum = new Yankum_Model;
	}
}
