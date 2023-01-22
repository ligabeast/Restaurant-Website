<?php
namespace App\Http\Middleware;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Illuminate\Http\Request;

class LogInformation{
    static function log_info(Request $rd): void{
        $logger = new Logger('info');

        $logger->pushHandler(new StreamHandler(__DIR__.'/../../../storage/logs/mylogger.log', Logger::INFO));

        $info = [
            'URL' => $rd->getUri(),
            'METHOD' => $rd->getMethod(),
            'BODY' => $rd->all(),
            'RESPONSE' => $rd->getContent()
        ];

        $logger->info(json_encode($info));
    }
    static function log_warn(Request $rd): void{
        $logger = new Logger('info');

        $logger->pushHandler(new StreamHandler(__DIR__.'/../../../storage/logs/mylogger.log', Logger::INFO));

        $info = [
            'URL' => $rd->getUri(),
            'METHOD' => $rd->getMethod(),
            'BODY' => $rd->all(),
            'RESPONSE' => $rd->getContent()
        ];

        $logger->warning(json_encode($info));
    }
}
