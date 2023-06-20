<?php

namespace Apps\Controller;

use Apps\Core\Controller\Request;
use Apps\Core\DebugHandler;
use Apps\Core\View\TwigCore;
use Apps\Core\Controller\ControllerInterface;
use Apps\Model\PromesseDonModel;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class SupprimerPromesseDonController implements ControllerInterface
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function execute(Request $request)
    {
        $dataModel = new PromesseDonModel();
        $dumper = new DebugHandler();

        $dataModel->delete($request->get('id'));

        header('location: /dons');
    }
}
