<?php
$pdo = require_once "database.php";

echo "######################################################################################################<br>";
echo "select * from user:";
$request = $pdo->prepare("select * from user");
$request->execute();
$result = $request->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";

echo "######################################################################################################<br>";
echo "select * from product:";
$request = $pdo->prepare("select * from product");
$request->execute();
$result = $request->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";

echo "######################################################################################################<br>";
echo "insert into user (username, email, password) values (delta, delta@com, delta_password):";

$username = "delta";
$email = "delta@com";
$password = "delta_password";

$request = $pdo->prepare("insert into user (username, email, password) values (:username, :email, :password)");
$request->bindValue(":username", $username);
$request->bindValue(":email", $email);
$request->bindValue(":password", $password);
$request->execute();
$result = $request->fetchAll();

$request = $pdo->prepare("select * from user");
$request->execute();
$result = $request->fetchAll();
echo "<pre>";
print_r($result);
echo "</pre>";

echo "######################################################################################################<br>";
echo "update product set name=ananas where id=2:";

$name = "ananas";
$id = "1";

$request = $pdo->prepare("update product set name=:name where id=:id");
$request->bindValue(":name", $name);
$request->bindValue(":id", $id);
$request->execute();
$result = $request->fetchAll();

$request = $pdo->prepare("select * from product");
$request->execute();
$result = $request->fetchAll();
echo "<pre>";
print_r($result);
echo "</pre>";

echo "######################################################################################################<br>";
echo "delete from product where id=2:";

$id = "2";

$request = $pdo->prepare("delete from product where id=:id");
$request->bindValue(":id", $id);
$request->execute();
$result = $request->fetchAll();

$request = $pdo->prepare("select * from product");
$request->execute();
$result = $request->fetchAll();
echo "<pre>";
print_r($result);
echo "</pre>";

?>