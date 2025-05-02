<?php
include_once("controllers/prestasi.controller.php");
include_once("views/Prestasi.view.php");

$action = $_GET['action'] ?? $_POST['action'] ?? 'index';

$controller = new PrestasiController();
$view = new PrestasiView();

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->add($_POST);
        } else {
            $view->renderForm();
        }
        break;
        
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_POST['id'], $_POST);
        } else {
            $controller->edit($_GET['id']);
        }
        break;
        
    case 'delete':
        $controller->delete($_GET['id']);
        break;
        
    default:
        $controller->index();
        break;
}