<?php
namespace App\Controllers;
require_once '../../vendor/autoload.php';
use App\Models\Model;
use App\Models\Model2;

$models = new Model();
if ($_REQUEST['action'] == 'comment') {
    $models->addComment();
} elseif ($_REQUEST['action'] == 'regist') {
    $models->addUsers();
} elseif ($_REQUEST['action'] == 'auth') {
    $models->checkUsers();
}
$data = new Model2();

if (isset($_GET['photo'])) {
    $data->GetFileUrl();
}elseif (isset($_GET['users'])){
    $data->GetUsers();
}