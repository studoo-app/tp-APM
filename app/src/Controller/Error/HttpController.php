<?php

namespace Apps\Controller\Error;

use Apps\Core\Controller\ControllerInterface;
use Apps\Core\Controller\Request;
use Apps\Core\View\TwigCore;
use Apps\Error\LoaderError;
use Apps\Error\RuntimeError;
use Apps\Error\SyntaxError;

class HttpController implements ControllerInterface
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function execute(Request $request)
    {
        // Si y a pas de GET alors j'affiche tout
        return TwigCore::getEnvironment()->render(
            'error/http-404.html.twig',
            []);
    }
}