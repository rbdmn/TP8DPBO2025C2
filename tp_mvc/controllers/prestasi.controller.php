<?php
include_once("conf.php");
include_once("models/DB.class.php");
include_once("models/Prestasi.class.php");
include_once("views/Prestasi.view.php");

class PrestasiController
{
    private $prestasi;

    function __construct()
    {
        $this->prestasi = new Prestasi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->prestasi->open();
        $result = $this->prestasi->getPrestasi();
        $data = array();
        
        while ($row = $this->prestasi->fetch($result)) {
            $data[] = $row;
        }
        
        $this->prestasi->close();

        $view = new PrestasiView();
        $view->render($data);
    }

    function add($data)
    {
        $this->prestasi->open();
        $this->prestasi->add($data);
        $this->prestasi->close();

        header("location:prestasi.php");
    }

    function edit($id)
    {
        $this->prestasi->open();
        $result = $this->prestasi->getById($id);
        $data = $this->prestasi->fetch($result);
        $this->prestasi->close();

        $view = new PrestasiView();
        $view->renderForm($data);
    }

    function update($id, $data)
    {
        $this->prestasi->open();
        $this->prestasi->update($id, $data);
        $this->prestasi->close();

        header("location:prestasi.php");
    }

    function delete($id)
    {
        $this->prestasi->open();
        $this->prestasi->delete($id);
        $this->prestasi->close();

        header("location:prestasi.php");
    }
}