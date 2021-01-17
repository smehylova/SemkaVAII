<?php

namespace App;

use App\Config\Configuration;
use App\Config\Kontrola;
use App\Core\DB\Connection;
use App\Core\Request;
use App\Core\Router;

/**
 * Class App
 * Main Application class
 * @package App
 */
class App
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Request
     */
    private Request $request;

    private ?Kontrola $kontrola;

    /**
     * App constructor
     */
    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request();
    }

    /**
     * Runs the application
     * @throws \Exception
     */
    public function run()
    {
        ob_start();

        // get a controller and action from URL
        $this->router->processURL();

        //create a Controller and inject App into it
        $controllerName = $this->router->getFullControllerName();
        $controller = new $controllerName($this);

        // call appropriate method of the controller class
        $response = call_user_func([$controller, $this->router->getAction()]);
        // return view to user
        $response->generate();

        // if DEBUG for SQL is set, show SQL queries to DB
        if (Configuration::DEBUG_QUERY) {
            $queries = array_map(function ($q) {
                $lines = explode("\n", $q);
                return '<pre>' . (substr($lines[1], 0, 7) == 'Params:' ? 'Sent ' . $lines[0] : $lines[1]) . '</pre>';
            }, Connection::getQueryLog());
            echo PHP_EOL . PHP_EOL . implode(PHP_EOL . PHP_EOL, $queries) . "\n\nTotal queries: " . count($queries);
        }
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Kontrola
     */
    public function getKontrola(): Kontrola
    {
        return $this->kontrola;
    }
}