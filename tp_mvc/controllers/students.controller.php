<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("models/Students.class.php");
include_once("views/Students.view.php");

class StudentsController
{
    private $students;

    function __construct()
    {
        $this->students = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->students->open();
        $result = $this->students->getStudents();
        $data = array();
        
        while ($row = $this->students->fetch($result)) {
            $data[] = $row;
        }
        
        $this->students->close();

        $view = new StudentsView();
        $view->render($data);
    }

    function add($data)
    {
        $this->students->open();
        $this->students->add($data);
        $this->students->close();

        header("location:students.php");
    }

    function edit($id)
    {
        $this->students->open();
        $result = $this->students->getById($id);
        $data = $this->students->fetch($result);
        $this->students->close();

        $view = new StudentsView();
        $view->renderForm($data);
    }

    function update($id, $data)
    {
        $this->students->open();
        $this->students->update($id, $data);
        $this->students->close();

        header("location:students.php");
    }

    function delete($id)
    {
        $this->students->open();
        $this->students->delete($id);
        $this->students->close();

        header("location:students.php");
    }
}