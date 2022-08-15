<?php
$page = $_GET['page'] ?? '';
switch ($page) {
    case '/':
        require __DIR__ . './views/page-accueil.php';
        break;    
    case '':
        require __DIR__ . './views/page-accueil.php';
        break;
        //pour ajouter une page : 
        // case 'nom de la page'
        // require __DIR__ . './views/page-nom-de-la-page.php';
        // pour les href : nom-de-la-page
    case 'dest':
        require __DIR__ . './views/destinationsFrame.php';
        break;
    case 'connexion':
        require __DIR__ . './views/connexion.php';
        break;
    case 'inscription':
        require __DIR__ . './views/inscription.php';
        break;
    case 'concept':
        require __DIR__ . './views/concept.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . './views/page-404.php';
        break;
}
