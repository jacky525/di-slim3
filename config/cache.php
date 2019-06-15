<?php
/**
 * cache 相關
 *
 * @author kaihan
 * @date   2017-08-18
 */

use Jbcp104\Middlewares\JobLoginMiddleware;
use Jbcp104\Modules\ForbiddenWord\Services\ForbiddenWordService;
use Jbcp104\Modules\Job\Services\AcService;
use Jbcp104\Modules\Job\Services\CustProfileService;
use Jbcp104\Modules\Job\Services\PoService;
use Jbcp104\Modules\Job\Services\StaffService;

return [
    'cache' => [
        'path' => [
            'router' => dirname(__DIR__) . '/cache/routes.php',
            'filesystemCache' => dirname(__DIR__) . '/cache/symfony-cache',
            'functionTree' => dirname(__DIR__) . '/cache/symfony-cache/functionTree',
            'diDefinition' => dirname(__DIR__) . '/cache/doctrine-cache/diDefinition',
        ],
        /*
         * class name => cache key => cache time (sec)
         */
        TestService::class => [
            'ttl' => 600,
        ],
    ],
];
