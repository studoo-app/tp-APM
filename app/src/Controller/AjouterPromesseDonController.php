<?php

namespace Apps\Controller;

use Apps\Core\Controller\Request;
use Apps\Core\DebugHandler;
use Apps\Core\View\TwigCore;
use Apps\Core\Controller\ControllerInterface;
use Apps\Entity\PromesseDon;
use Apps\Model\PromesseDonModel;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AjouterPromesseDonController implements ControllerInterface
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function execute(Request $request)
    {
        $twig = TwigCore::getEnvironment();

        $errors = [];
        if($request->getHttpMethod() === "POST") {

            if($this->validInputs($_POST)){
                $dataModel = new PromesseDonModel();
                $promesse = new PromesseDon();
                $promesse->setEmail($_POST["email"]);
                $promesse->setFirstname($_POST["firstname"]);
                $promesse->setLastname($_POST["lastname"]);
                $promesse->setAmount($_POST["amount"]);
                $dataModel->create($promesse);

                header('location: /dons');

            }else{
                $errors["message"] = "Une erreur est survenue !";
            }

        }

        return $twig->render('promesse_don/ajouter.html.twig', [
            'errors' => $errors
        ]);
    }

    private function validInputs($data): bool
    {
        return isset($data['email']) && isset($data['firstname']) && isset($data['lastname']) && isset($data['amount']);
    }

}
