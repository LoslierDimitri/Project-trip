<?php

require_once './models/Database.php';

class UserModel extends Database {

    private $table = 'users';

    public function createUser($type, $nom, $prenom, $age, $sexe, $pseudo, $mot_de_passe, $email, $telephone, $pays, $adresse){
        $req = "INSERT INTO $this->table (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) VALUES (:type, :nom, :prenom, :age, :sexe, :pseudo, :mot_de_passe, :email, :telephone, :pays, :adresse)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':sexe', $sexe);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':mot_de_passe', $mot_de_passe);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':telephone', $telephone);
        $stmt->bindValue(':pays', $pays);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->execute();
    }

    public function getUser($pseudo, $mot_de_passe){
        $req = "SELECT * FROM $this->table WHERE pseudo = :pseudo AND mot_de_passe = :mot_de_passe";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':mot_de_passe', $mot_de_passe);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
}