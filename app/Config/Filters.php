<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'ceklogin' => \App\Filters\Ceklogin::class,
        'filtersuperuser' => \App\Filters\Filtersuperuser::class,
        'filtermarketing' => \App\Filters\Filtermarketing::class,
        'filterstaffops' => \App\Filters\Filterstaffops::class,
        'filterkepalaops' => \App\Filters\Filterkepalaops::class,
        'filtermonitoringcs' => \App\Filters\Filtermonitoringcs::class,
        'filteradmin' => \App\Filters\Filteradmin::class,
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
            // 'invalidchars',
            // 'filtersuperuser' => [
            //     'except' => ['login/*', 'login', '/']
            // ],
            // 'filtermarketing' => [
            //     'except' => ['login/*', 'login', '/']
            // ],
            // 'filterkepalaops' => [
            //     'except' => ['login/*', 'login', '/']
            // ],
            // 'filterstaffops' => [
            //     'except' => ['login/*', 'login', '/']
            // ],
            // 'filtermonitoringcs' => [
            //     'except' => ['login/*', 'login', '/']
            // ],
            // 'filteradmin' => [
            //     'except' => ['login/*', 'login', '/']
            // ]
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
            // 'filtersuperuser' => ['except' => ['home/*','marketing/*','admin/*','monitoringcs/*','kepalaops/*','staffops/*','vendor/*','user/*','customer/*']],
            // 'filtermarketing' => ['except' => ['home/*','marketing/*','vendor/*','user/*','customer/*']],
            // 'filterkepalaops' => ['except' => ['home/*','kepalaops/*','vendor/*','user/*','customer/*']],
            // 'filterstaffops' => ['except' => ['home/*','staffops/*','vendor/*','user/*','customer/*']],
            // 'filtermonitoringcs' => ['except' => ['home/*','monitoringcs/*','vendor/*','user/*','customer/*']],
            // 'filteradmin' => ['except' => ['home/*','admin/*','vendor/*','user/*','customer/*']],

        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
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

    ];
}
