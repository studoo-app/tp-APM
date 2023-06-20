<?php

namespace Apps\Controller;

use Apps\Core\Controller\Request;
use Apps\Core\View\TwigCore;
use Apps\Core\Controller\ControllerInterface;
use Apps\Entity\PromesseDon;
use Apps\Model\PromesseDonModel;
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
        $dataModel = new PromesseDonModel();
        $promesse = $dataModel->get($request->getVars()['id']);
        $errors = [];

        if($request->getHttpMethod() === "POST") {

            if($this->validInputs($_POST)){
                $promesse->setEmail($_POST["email"]);
                $promesse->setFirstname($_POST["firstname"]);
                $promesse->setLastname($_POST["lastname"]);
                $promesse->setAmount($_POST["amount"]);
                $dataModel->update($promesse);

                header('location: /dons');

            }else{
                $errors["message"] = "Une erreur est survenue !";
            }

        }
        return $twig->render('promesse_don/modifier.html.twig', [
            'promesseDon' => $promesse,
            'errors'=>$errors
        ]);
    }

    private function validInputs($data): bool
    {
        return isset($data['email']) && isset($data['firstname']) && isset($data['lastname']) && isset($data['amount']);
    }
}
