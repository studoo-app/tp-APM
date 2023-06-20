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

class ListePromesseDonsController implements ControllerInterface
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function execute(Request $request)
    {
        $twig = TwigCore::getEnvironment();

        $dataModel = new PromesseDonModel();
        return $twig->render('promesse_don/liste.html.twig', [
            'promesse_dons' => $dataModel->getAll()
        ]);
    }
}
