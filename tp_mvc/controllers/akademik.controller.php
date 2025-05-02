<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("models/akademik.class.php");
include_once("views/akademik.view.php");

class AkademikController
{
    private $akademik;

    function __construct()
    {
        $this->akademik = new Akademik(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->akademik->open();
        $result = $this->akademik->getAkademik();
        $data = array();
        
        while ($row = $this->akademik->fetch($result)) {
            $data[] = $row;
        }
        
        $this->akademik->close();

        $view = new AkademikView();
        $view->render($data);
    }

    public function add($post)
    {
        $this->akademik->open();
        $this->akademik->add($post);
        $this->akademik->close();
        header("Location:akademik.php");
    }

    function edit($id)
    {
        $this->akademik->open();
        $result = $this->akademik->getById($id);
        $data = $this->akademik->fetch($result);
        $this->akademik->close();

        $view = new AkademikView();
        $view->renderForm($data);
    }

    function update($id, $data)
    {
        $this->akademik->open();
        $this->akademik->update($id, $data);
        $this->akademik->close();

        header("location:akademik.php");
    }

    public function delete($id)
    {
        $this->akademik->open();
        $this->akademik->delete($id);
        $this->akademik->close();
        header("Location:akademik.php");
    }
}
