<?php

declare(strict_types=1);
/**
 * Front controller bootstrapping HTTP routing - initializing app via action controller(s)
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.25
 * @since 2023-05-22
 */

namespace SchrodtSven\P7WikiFoo\Internal\Kernel;

use Error;
use SchrodtSven\P7WikiFoo\Communication\Http\Router;
use SchrodtSven\P7WikiFoo\Entity\Frontend\HtmlAttributes;
use SchrodtSven\P7WikiFoo\Entity\Frontend\HtmlElement;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\Kernel\ActionController;

class FrontController
{
    /**
     * Instance of HTTP router
     *
     * @var Router
     */
    private Router $router;

    /**
     * Action controller to be instantiated
     *
     * @var ActionController
     */
    private ActionController $controller;

    /**
     * Constructor function
     */
    public function __construct()
    {
        $this->router = SingletonFactory::get(Router::class);
        try {
            $this->controller = $this->router->getActionController();
        } catch(Error $err) {
            echo '404 -' . $err->getMessage();
        }
        $this->run();
    }    

    /**
     * Running app
     *
     * @FIXME - correct HTTP status codes on errors (non-existing action controllers, runtime errors etc.)
     * @return void
     */
    public function run(): void
    {
        $action  = $this->router->getActionControllerActionName();
        try {
            $this->controller->$action($this->router->getParams()->raw());
        } catch(\Error $e) {
            echo $e->getMessage();
        }
    }
}