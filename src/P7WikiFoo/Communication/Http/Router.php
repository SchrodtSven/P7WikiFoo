<?php

declare(strict_types=1);
/**
 * Class managing HTTP routing:
 *   uri (http|https://foo/bar/..)  => $SUB\NAMESPACE\$Class::method(...parameters)
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

    public function parseParams(P7Array $data): void
    {
        // @FIXME - if (count($data) % 2 !==0 ) || === boolean --> codify!
        $this->params = new P7Array();
        while(count($data)) {
            $this->params[$data->shift()] = $data->shift();
        }
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParams(): P7Array
    {
        return $this->params;
    }
}