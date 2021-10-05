<?php

namespace Config;

use App\Filters\Auth;
use App\Filters\TipikorFilters;
use App\Filters\AdminFilters;
use App\Filters\WbsFilters;
use App\Filters\YankumFilters;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'auth' => Auth::class,
		'admin' => AdminFilters::class,
		'tipikor' => TipikorFilters::class,
		'wbs' => WbsFilters::class,
		'yankum' => YankumFilters::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'auth' => [

			'before' => [

				'/admin/login',

				'/admin/admindashboard',

				'/admin/admindashboard/*',

				'/admin/tipikordashboard',

				'/admin/tipikordashboard/*',

				'/admin/wbsdashboard',

				'/admin/wbsdashboard/*',

				'/admin/yankumdashboard',

				'/admin/yankumdashboard/*',

				'/admin/users',

				'/admin/users/*',

				'/admin/sitaradashboard',

				'/admin/sitaradashboard/*',

				'/admin/tipikor',

				'/admin/tipikor/*',

				'/admin/wbs',

				'/admin/wbs/*',

				'/admin/yankum',

				'/admin/yankum/*',
			]
		],
		'admin' => [

			'after' => [

				'/Back/TipikorDashboard',

				'/Back/TipikorDashboard/*',

				'/Back/WbsDashboard',

				'/Back/WbsDashboard/*',

				'/Back/YankumDashboard',

				'/Back/YankumDashboard/*',

				'/Back/Tipikor',

				'/Back/Tipikor/*',

				'/Back/Wbs',

				'/Back/Wbs/*',

				'/Back/Yankum',

				'/Back/Yankum/*',

			]
		],

		'tipikor' => [

			'after' => [

				'/Back/AdminDashboard',

				'/Back/AdminDashboard/*',

				'/Back/WbsDashboard',

				'/Back/WbsDashboard/*',

				'/Back/YankumDashboard',

				'/Back/YankumDashboard/*',

				'/Back/Users',

				'/Back/Users/*',

				'/Back/Sitara',

				'/Back/Sitara/*',

				'/Back/Wbs',

				'/Back/Wbs/*',

				'/Back/Yankum',

				'/Back/Yankum/*',

			]
		],

		'wbs' => [

			'after' => [

				'/Back/AdminDashboard',

				'/Back/AdminDashboard/*',

				'/Back/TipikorDashboard',

				'/Back/TipikorDashboard/*',

				'/Back/YankumDashboard',

				'/Back/YankumDashboard/*',

				'/Back/Users',

				'/Back/Users/*',

				'/Back/Sitara',

				'/Back/Sitara/*',

				'/Back/Tipikor',

				'/Back/Tipikor/*',

				'/Back/Yankum',

				'/Back/Yankum/*',

			]
		],

		'yankum' => [

			'after' => [

				'/Back/AdminDashboard',

				'/Back/AdminDashboard/*',

				'/Back/WbsDashboard',

				'/Back/WbsDashboard/*',

				'/Back/TipikorDashboard',

				'/Back/TipikorDashboard/*',

				'/Back/Users',

				'/Back/Users/*',

				'/Back/Sitara',

				'/Back/Sitara/*',

				'/Back/Wbs',

				'/Back/Wbs/*',

				'/Back/Tipikor',

				'/Back/Tipikor/*',

			]
		]
	];
}
