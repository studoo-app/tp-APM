<?php

namespace Apps\Controller;

use Apps\Core\Controller\Request;
use Apps\Core\View\TwigCore;
use Apps\Core\Controller\ControllerInterface;
use Apps\Model\PromesseDonModel;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DetailPromesseDonController implements ControllerInterface
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

        return $twig->render('promesse_don/detail.html.twig', [
            'promesseDon' => $dataModel->get($request->get('id'))
        ]);
    }
}
