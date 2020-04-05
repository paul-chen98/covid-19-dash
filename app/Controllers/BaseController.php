<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use Parse\ParseClient;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();


		// Initializes with the <APPLICATION_ID>, <REST_KEY>, and <MASTER_KEY>
		$appid = "ACuVoInq1z9adTHEuIY4iJUR3rjp2I7d0lFC2LJI";
		$rkey = "lMJ4NNpHWXvTBiFNWqbut35lXClUiLHGpDN3jFgH";
		$mkey = "erzImShLNBP9sAPoVZWmUcilqiX2pUNbXeVnVMna";
		ParseClient::initialize( $appid,$rkey,$mkey );
		ParseClient::setServerURL('https://parseapi.back4app.com/', '/');
	}

}
