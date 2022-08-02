<?php
$page = $_GET['page'] ?? '';
switch ($page) {
    case '/':
        require __DIR__ . './projet/front/html/page-accueil.php';
        break;
    case '':
        require __DIR__ . './projet/front/html/page-accueil.php';
        break;
        //pour ajouter une page : 
        // case 'nom de la page'
        // require __DIR__ . '/projet/front/html/page-nom-de-la-page.php';
        // pour les href : project-trip/nom-de-la-page
    case 'dest':
        require __DIR__ . '/projet/front/html/destinationsFrame.php';
        break;
    case 'connexion':
        require __DIR__ . './projet/front/html/connexion.php';
        break;
    case 'inscription':
        require __DIR__ . './projet/front/html/inscription.php';
        break;
    case 'concept':
        require __DIR__ . './projet/front/html/concept.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/projet/front/html/page-404.php';
        break;
}
