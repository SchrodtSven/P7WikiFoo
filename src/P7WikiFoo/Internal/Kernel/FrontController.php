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

use SchrodtSven\P7WikiFoo\Communication\Http\Router;
use SchrodtSven\P7WikiFoo\Entity\Frontend\HtmlAttributes;
use SchrodtSven\P7WikiFoo\Entity\Frontend\HtmlElement;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;

class FrontController
{
    private Router $router;

    public function __construct()
    {
        $this->router = SingletonFactory::get(Router::class);
        $this->run();
    }    

    public function run(): void
    {
        $parser = SingletonFactory::get(PhtmlParser::class);
        $parser->setTplName('raw.table');
        $parser->setTplType(PhtmlParser::RENDER_DOCLET);
        $parser->rows = [
                            ['action', $this->router->getController()],
                            ['controller', $this->router->getAction()],
                            ['params', var_export($this->router->getParams(), true)]
        ];

        $head = new HtmlElement('h1', 'Lorem Ipsum');
        $att = new HtmlAttributes(['style' => 'color: blue']);
        $head->setAttributes($att);
        $parser->header = ($head->render());
        $parser->footer = (new HtmlElement('pre', (new HtmlElement('h1', 'Ipsum Lorem'))->render()  ))->render();
        echo $parser->render();
    }
}