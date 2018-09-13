<?php
require_once '../vendor/autoload.php';
//var_dump(__DIR__);
//$loader = new Twig_Loader();
$loader = new Twig_Loader_Filesystem(realpath(__DIR__));
$twig = new Twig_Environment($loader);
echo $twig->render('test.twig', array('name' => 'Петр'));
