<?php
/*
how to use this file
in your file where you need to call a database request:

------------------------------------------------------------------
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Project-trip/Model/Database.php";
require($path_new);
$database = new Database();
------------------------------------------------------------------

to call a request you do:
------------------------------------------------------------------
$result = $database->get_user($_SESSION["id"]);
------------------------------------------------------------------
*/
class Database
{
    private $connection;

    //-------------------------------------------------------------------------------- private function
    private function set_connection()
    {
        $database_name = "mysql:host=localhost;dbname=projet_trip";
        $database_username = "root";
        $database_password = "root";

        try {
            $pdo = new PDO($database_name, $database_username, $database_password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

            ]);
            if ($pdo != null) {
                return $pdo;
            }
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
        return null;
    }

    private function del_connection()
    {
        return null;
    }

    //-------------------------------------------------------------------------------- user function
    public function get_user_information($select, $element, $value)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $req = "select " . $select . " from users where " . $element . "=:value;";
            $stmt = $this->connection->prepare($req);
            $stmt->bindValue(":value", $value);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        }

        $this->connection = $this->del_connection();
    }

    public function get_user_all_information($id_user)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $req = "select * from users where id=:id_user;";
            $stmt = $this->connection->prepare($req);
            $stmt->bindValue(":id_user", $id_user);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        }

        $this->connection = $this->del_connection();
    }

    public function insert_user($type, $nom, $prenom, $age, $sexe, $pseudo, $mot_de_passe, $email, $telephone, $pays, $adresse)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $stmt = $this->connection->prepare('insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values (:type, :nom, :prenom, :age, :sexe, :pseudo, :mot_de_passe, :email, :telephone, :pays, :adresse)');
            $stmt->bindValue(":type", $type);
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":prenom", $prenom);
            $stmt->bindValue(":age", strval($age));
            $stmt->bindValue(":sexe", $sexe);
            $stmt->bindValue(":pseudo", $pseudo);
            $stmt->bindValue(":mot_de_passe", $mot_de_passe);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":telephone", $telephone);
            $stmt->bindValue(":pays", $pays);
            $stmt->bindValue(":adresse", $adresse);
            $stmt->execute();

            return;
        }

        $this->connection = $this->del_connection();
    }

    //-------------------------------------------------------------------------------- map function
    public function get_regions_information($select)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $stmt = $this->connection->prepare("select " . $select . " from regions");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        $this->connection = $this->del_connection();
    }

    public function get_specialities_information($select, $id_region)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $stmt = $this->connection->prepare("select " . $select . " from specialities where idregions = :id_regions");
            $stmt->bindValue(":id_regions", $id_region);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        $this->connection = $this->del_connection();
    }

    public function get_visits_information($select, $id_region)
    {
        $this->connection = $this->set_connection();

        if ($this->connection != null) {
            $stmt = $this->connection->prepare("select " . $select . " from visits where idregions = :id_regions");
            $stmt->bindValue(":id_regions", $id_region);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        $this->connection = $this->del_connection();
    }
}