<?php
include_once("controllers/Students.controller.php");
include_once("views/Students.view.php");

$action = $_GET['action'] ?? $_POST['action'] ?? 'index';

$controller = new StudentsController();
$view = new StudentsView();

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