<?php

echo "attempt to connect to database...<br>";
$pdo = new PDO("mysql:host=localhost;dbname=sql_base", "root", "root", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
echo "connect to database OK<br>";

return $pdo;

/*
#database reset
use sql_base;

truncate user;
truncate product;

insert into user (username, email, password) values ("alpha", "alpha@com", "alpha_password");
insert into user (username, email, password) values ("beta", "beta@com", "beta_password");
insert into user (username, email, password) values ("charlie", "charlie@com", "charlie_password");

insert into product (name, user_id) values ("pomme", 1);
insert into product (name, user_id) values ("poire", 1);
insert into product (name, user_id) values ("cerise", 1);

select * from user;
#select * from travel;
*/
?>