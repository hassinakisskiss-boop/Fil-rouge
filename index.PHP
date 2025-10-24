<?php
session_start();

require_once 'src/Controller/MissionCtrl.php';
require_once 'src/Controller/CategoryCtrl.php';
require_once 'src/Model/CategoryModel.php';
require_once 'config/database.php';

// On récupère la page dans l’URL (ex: ?page=mission)
$page = filter_input(INPUT_GET, 'page');//Ici j'ai récupéré "mission"

// Tableau des routes : page => contrôleur
$route = [
    "mission"  => MissionCtrl::class, //::class pour dire que je fais appelle à la classe MissionCtrl
    "category" => CategoryCtrl::class//=> pour créer une paire clé/valeur
];

$controller = null;

// A revoir.
foreach ($route as $routeValue => $className) {
    if ($page == $routeValue) {
        $controller = new $className($db);
        $controller->manage();
    }
}

// Si aucune page demandée → page d'accueil par défaut
if (!$controller) {
    require_once "src/View/home.php";
}
