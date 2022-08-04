<?php
/*
connexion a la bdd

retourne la connexion
*/

/*
creation bdd

CREATE DATABASE `projet_trip`;
USE projet_trip;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8mb4_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `age` int NOT NULL,
  `sexe` char(1) COLLATE utf8mb4_bin NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

truncate projet_trip.users;

insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values ("a", "alpha_nom", "alpha_prenom", 10, "m", "alpha_pseudo", "alpha_mdp", "alpha@com", "0123456789", "france", "alpha_addresse");
insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values ("c", "beta_nom", "beta_prenom", 20, "f", "beta_pseudo", "beta_mdp", "beta@com", "0123456789", "belgique", "beta_addresse");
insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values ("c", "charlie_nom", "charlie_prenom", 30, "m", "charlie_pseudo", "charlie_mdp", "charlie@com", "0123456789", "france", "charlie_addresse");
insert into projet_trip.users (type, nom, prenom, age, sexe, pseudo, mot_de_passe, email, telephone, pays, adresse) values ("a", "delta_nom", "delta_prenom", 40, "f", "delta_pseudo", "delta_mdp", "delta@com", "0123456789", "canada", "delta_addresse");

SELECT * FROM users;

--------------------------------------
how tu use this file

require "database_connect.php";
require "../database/database_connect.php";

connection = database_connect(); -> return the database connection
*/

function database_connect() {
$database_name = "mysql:host=localhost;dbname=projet_trip";

    echo "connect to database: [" . $database_name . "]... <br>";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=projet_trip', 'root', 'root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    
]);
if ($pdo != null) {
    echo "database connected <br>";
    return $pdo;
}
    
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
return;
}
?>