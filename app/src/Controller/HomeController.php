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

class HomeController implements ControllerInterface
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

        $stats = [
            "promis"=>$dataModel->getTotalAmount(),
            "securise"=>$dataModel->getSecuredAmount(),
            "enAttente"=>$dataModel->getPendingAmount()
        ];

        return $twig->render('home/home.html.twig', [
            'stats' => $stats
        ]);
    }
}
