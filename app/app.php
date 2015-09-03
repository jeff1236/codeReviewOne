<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contacts.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('home.html.twig', array('contact' => Contacts::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {
        $contact = new Contacts($_POST['list_of_contacts']);
        $contact->save();
        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact))
        ;
    });

    $app->post("/delete_contacts", function() use ($app) {
        Task::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
?>
