<?php


$host = 'localhost'; //host=serveur, adresse du serveur où tourne mysql
$dbname = 'fil_rouge'; //Le nom de ma base de donnée.
$user = 'root';
$password = "";

try {

    $db = new PDO(
        "mysql:host=$host;
        dbname=$dbname", //PDO est une classe qui permet de se connecter.Je crée un nouvel objet PDO et je le stocke dans la variable $db
        $user,
        $password, //"mysql:" est le nom de mon driver
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)//Tableau d'option pour configurer PDO. ATTR_ERRMODE;option qui définit comment PDO réagit aux erreurs. 
    ); 

} catch (PDOException $e) { //PDOException est une classe, $e est un objet de cette classe

    die('Echec connexion DDB' . $e->getMessage()); //GetMessage est une méthode qui permet de récupérer l'erreur
}
