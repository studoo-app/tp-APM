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

    public function create(PromesseDon $promesseDon): void
    {
        $requete = $this->bdd
            ->prepare('INSERT INTO `promesse_don` (`id`, `email`, `firstname`, `lastname`, `amount`, `created_at`, `honored_at`) VALUES (NULL, :email, :firstname, :lastname, :amount, :createdAt, NULL);');
        $requete->execute($promesseDon->toArray());
    }

    public function update(PromesseDon $promesseDon): void
    {
        $requete = $this->bdd
            ->prepare('UPDATE `promesse_don` SET `email`=:email,`firstname`= :firstname,`lastname`= :lastname, `amount`= :amount  WHERE `promesse_don`.`id` = :id;');
        $requete->execute([
            'id'=>$promesseDon->getId(),
            'email'=>$promesseDon->getEmail(),
            'firstname'=>$promesseDon->getFirstname(),
            'lastname'=>$promesseDon->getLastname(),
            'amount'=>$promesseDon->getAmount(),
        ]);
    }

    public function markAsHonored(PromesseDon $promesseDon): void
    {
        $requete = $this->bdd
            ->prepare('UPDATE `promesse_don` SET `honored_at`= :honoredAt  WHERE `promesse_don`.`id` = :id;');
        $requete->execute([
            "id"=>$promesseDon->getId(),
            "honoredAt"=>$promesseDon->getHonoredAt()->format('Y-m-d H:i:s')
        ]);
    }

    public function delete(int $id): void
    {
        $requete = $this->bdd
            ->prepare('DELETE FROM promesse_don WHERE `promesse_don`.`id` = :id ');
        $requete->execute(['id'=>$id]);
    }

    public function getTotalAmount(){
        $requete = $this->bdd
            ->prepare('SELECT SUM(amount) FROM `promesse_don`');
        $requete->execute();

        return $requete->fetch()[0];
    }

    public function getSecuredAmount(){
        $requete = $this->bdd
            ->prepare('SELECT SUM(amount) FROM `promesse_don` WHERE `honored_at` IS NOT NULL ');
        $requete->execute();

        return $requete->fetch()[0];
    }

    public function getPendingAmount(){
        $requete = $this->bdd
            ->prepare('SELECT SUM(amount) FROM `promesse_don` WHERE `honored_at` IS NULL ');
        $requete->execute();

        return $requete->fetch()[0];
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
