<?php

namespace Apps\Controller;

use Apps\Core\Controller\Request;
use Apps\Core\View\TwigCore;
use Apps\Core\Controller\ControllerInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ModifierPromesseDonController implements ControllerInterface
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function execute(Request $request)
    {
        $twig = TwigCore::getEnvironment();

        return $twig->render('home/home.html.twig', [
            'visu' => false
        ]);
    }
}
