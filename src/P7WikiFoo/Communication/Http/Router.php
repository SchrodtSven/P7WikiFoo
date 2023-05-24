<?php

declare(strict_types=1);
/**
 * Class managing HTTP routing:
 *  - uri (http|https://example.com/foo/bar/..)  => $SUB\NAMESPACE\$Class::method(...parameters)
 * 
 * @TODO Extend routing to work in sub directories of $DOCUMENT_ROOT!!!
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-18
 */

namespace SchrodtSven\P7WikiFoo\Communication\Http;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\Communication\Http\Request;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\Kernel\ActionController;

class Router
{
    
    public const DEFAULT_CONTROLLER = 'Default';
    public const DEFAULT_ACTION = 'default';

    private P7Array $params;

    private string $controller;

    private string $action;

    /**
     * Relative URI -> /$foo
     *
     * @var string
     */
    private string $relUri = '';
    
    /**
     * Constructor function
     *
     * @param Request $request
     * @param string $relUri
     */
    public function __construct(private ?RequestInterface $request = null)
    {
        if(is_null($this->request)) {
            $this->request = SingletonFactory::get(Request::class);
        }
        $this->relUri = $this->request->getRequestUri();
        $this->dispatch();
    }   

    /**
     * Dispatching HTTP route to Action controller / action / parameters
     *
     * @return void
     */
    private function dispatch()
    {
        $tmp = (new P7String($this->relUri))->splitBy('/')->unsetIfEmptyAtMargins();
        
        switch(count($tmp)) {
        
            case 0:
                    $this->controller = self::DEFAULT_CONTROLLER;
                    $this->action = self::DEFAULT_ACTION;
                break;

            case 1:
                    $this->controller = $tmp->shift();
                    $this->action = self::DEFAULT_ACTION;
               break;

            default: 
                    $this->controller = ucfirst(strtolower($tmp->shift()));
                    $this->action = strtolower($tmp->shift());
                   
        }
        $this->parseParams($tmp);
    }

    /**
     * Parsing parameters from URI
     *
     * @param P7Array $data
     * @return void
     */
    public function parseParams(P7Array $data): void
    {
        // @FIXME - if (count($data) % 2 !==0 ) || === boolean --> codify!
        // @FIXME - $_GET/$_POST/PUT etc.
        $this->params = new P7Array();
        while(count($data)) {
            $this->params[$data->shift()] = $data->shift();
        }
    }

    public function getControllerName(): string
    {
        return $this->controller;
    } 

    public function getActionName(): string
    {
        return $this->action;
    }

    public function getParams(): P7Array
    {
        return $this->params;
    }

    public function getActionController(): ActionController
    {
        
        return new (App::ACTION_CONTROLLER_NAMESPACE . $this->getControllerName() . App::CONTROLLER_SUFFIX);
    }

    public function getActionControllerActionName(): string
    {
        return $this->getActionName() . App::ACTION_SUFFIX;
    }

    /**
     * Getter for curent HTTP request object
     *
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    { 
        return $this->request; 
    }
}