<?php
// Get the URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Strip out '/ecommerce/public' part from the URI
$uri = str_replace('/ecommerce/public', '', $uri);

// Optional: Remove any trailing slashes
$uri = rtrim($uri, '/');

// Routing logic
switch ($uri) {
    case '':
    case '/home':
        require 'home.php';
        break;

    case '/about':
        require 'about.php';
        break;
    case '/category':
        require 'category.php';
        break;

    case '/contact':
        require 'contact.php';
        break;
    case '/products':
        require 'products.php';
        break;
        break;
    case '/account':
        require 'account.php';
        break;
    case '/terms':
        require 'terms_conditions.php';
        break;
    case '/faq':
        require 'faq.php';
        break;

    case '/post':
        require 'news.php';
        break;
    case '/news':
        require 'news_all.php';
        break;
    case '/search':
        require 'search.php';
        break;
    case '/register':
        require 'register.php';
        break;
    case '/gallery':
        require 'gallery.php';
        break;
    case '/bestsneaker':
        require 'event.php';
        break;
    case '/delivery':
        require 'delivery_returns.php';
        break;

    default:
        require 'home.php';
        break;
}


?>