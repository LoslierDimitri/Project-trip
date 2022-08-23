<?php
$page = $_GET['page'] ?? '';
switch ($page) {
        //pour ajouter une page : 
        // case 'nom de la page'
        // require __DIR__ . './views/page-nom-de-la-page.php';
        // pour les href : nom-de-la-page
    case '/':
        require __DIR__ . './views/page-accueil.php';
        break;
    case '':
        require __DIR__ . './views/page-accueil.php';
        break;
    case 'accueil':
        require __DIR__ . './views/page-accueil.php';
        break;
    case 'destinations':
        require __DIR__ . './views/destinations.php';
        break;
    case 'temoignages':
        require __DIR__ . './views/temoignages.php';
        break;
    case 'connexion':
        require __DIR__ . './views/connexion.php';
        break;
    case 'inscription':
        require __DIR__ . './views/inscription.php';
        break;
    case 'logout':
        require __DIR__ . './views/inscription.php';
        break;
    case 'concept':
        require __DIR__ . './views/concept.php';
        break;
    case 'search_result':
        require __DIR__ . './views/search_result.php';
        break;
    case 'my_account':
        require __DIR__ . './views/my-account.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . './views/page-404.php';
        break;
}