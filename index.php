<?php
$page = $_GET['page'] ?? '';
switch ($page) {
        //pour ajouter une page : 
        // case 'nom de la page'
        // require __DIR__ . './views/page-nom-de-la-page.php';
        // pour les href : nom-de-la-page
    case '/':
        require __DIR__ . './Controller/controller_main.php';
        break;
    case '':
        require __DIR__ . './Controller/controller_main.php';
        break;
    case 'accueil':
        require __DIR__ . './Controller/controller_main.php';
        break;
    case 'destinations':
        require __DIR__ . './Controller/controller_destinations.php';
        break;
    // case 'temoignages':
    //     require __DIR__ . './views/temoignages.php';
    //     break;
    case 'login':
        require __DIR__ . './Controller/controller_connection.php';
        break;
    case 'signup':
        require __DIR__ . './Controller/controller_registration.php';
        break;
    case 'concept':
        require __DIR__ . './Controller/controller_concept.php';
        break;
    case 'search_result':
        require __DIR__ . './Controller/controller_result.php';
        break;
    case 'my_account':
        require __DIR__ . './Controller/controller_account.php';
        break;
    // case 'my_trips':
    //     require __DIR__ . './Controller/';
    //     break;
    case 'logout':
        require __DIR__ . './Controller/controller_deconnection.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '../Controller/controller_404.php';
        break;
}