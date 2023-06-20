<?php

namespace Apps\Model;

use Apps\Core\Service\DatabaseService;
use Apps\Entity\PromesseDon;

class PromesseDonModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DatabaseService::getConnect();
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $requete = $this->bdd->prepare('SELECT * FROM promesse_don');
        $requete->execute();
        $promesses = [];

        foreach ($requete->fetchAll() as $value)
        {
            $promesses[] = $this->buildPromesse($value);
        }

        return $promesses;
    }

    /**
     * @param int $id
     * @return PromesseDon
     */
    public function get(int $id): PromesseDon
    {
        $requete = $this->bdd->prepare('SELECT * FROM promesse_don where id = ' . $id);
        $requete->execute();
        $result = $requete->fetch();

        $promesse = $this->buildPromesse($result);

        return  $promesse;
    }


    private function buildPromesse(array $data): PromesseDon
    {
        $promesse = new PromesseDon();
        $promesse->setId($data["id"]);
        $promesse->setEmail($data["email"]);
        $promesse->setFirstname($data["firstname"]);
        $promesse->setLastname($data["lastname"]);
        $promesse->setAmount($data["amount"]);
        $promesse->setCreatedAt(new \DateTime($data["created_at"]));
        $promesse->setHonoredAt($data['honored_at'] ? new \DateTime($data["honored_at"]) : null);

        return $promesse;
    }

}
