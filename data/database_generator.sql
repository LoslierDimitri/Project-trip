CREATE DATABASE `projet_trip` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
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
SELECT * FROM users;
