<?php
/*
appel a database_connect.php
fait les requetes sur la bdd
appel a database_disconnect.php

si requete:
    select  retourne le resultat
    insert  ne retourne rien
    update  ne retourne rien

--------------------------------------
how tu use this file

require "database_request.php";
require "../database/database_request.php";

the rest depend on the request
*/

/*
request select
--------------------------------------
how tu use this request

$value = dadabase_select(<connection>, <string selected attribute>)
*/
function database_select($connection, $select) {
    echo "request select... <br>";
    if ($connection != null) {
    $stmt = $connection->prepare("select " . $select . " from users");
    //$stmt->bindValue(':select', $select);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo "request select done <br>";
    return $result;
    }
    return "error to database request select <br>";
}

/*
request select where
--------------------------------------
how tu use this request

$value = dadabase_select(<connection>, <string selected attribute>, <select column>, <value>)
*/
function database_select_where($connection, $select, $where, $element) {
    echo "request select... <br>";
    if ($connection != null) {
    $stmt = $connection->prepare("select " . $select . " from users where " . $where . " = :element");
/*/$stmt->bindValue(':select', $select);
    $stmt->bindValue(':where', $where);*/
    $stmt->bindValue(':element', $element);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo "request select done <br>";
    return $result;
    }
    return "error to database request select <br>";
}

/*
request insert
--------------------------------------
how tu use this request

dadabase_insert(<connection>, <string for each data type>)
*/
function database_insert($connection, $type, $nom, $prenom, $age, $sexe, $pseudo, $mot_de_passe, $email, $telephone, $pays, $adresse) {
    echo "request insert... <br>";
    if ($connection != null) {
        //$stmt = $connection->prepare("insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values ( " . $type . ", " . $nom . ", " . $prenom . ", " . $age . ", " . $sexe . ", " . $pseudo . ", " . $mot_de_passe . ", " . $email . ", " . $telephone . ", " . $pays . ", " . $adresse . " )");
        $stmt = $connection->prepare('insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values (:type, :nom, :prenom, :age, :sexe, :pseudo, :mot_de_passe, :email, :telephone, :pays, :adresse)');
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
       // $result = $stmt->fetchAll();
    
        //return $result;
        }
        else {
        echo "error to database request insert <br>";
        }
        echo "request insert done <br>";
}

/*
request update
--------------------------------------
how tu use this request

dadabase_update(<connection>, <string selected attribute>, <string new value>, <int id of the user>)
*/
function database_update($connection, $name, $value) {
    echo "request update... <br>";
    if ($connection != null) {
        $stmt = $connection->prepare("update users set ".$name."=:".$name."");
        $stmt->bindValue(":".$name."", $value);
        $stmt->execute();
    
        }
        else {
        echo "error to database request update <br>";
        }
        echo "request update done <br>";
}

?>