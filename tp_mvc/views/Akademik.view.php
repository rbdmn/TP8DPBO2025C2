<?php
include_once("views/Template.class.php");

class AkademikView
{
    private $akademik;

    public function __construct()
    {
        $this->akademik = new Akademik(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function render($data)
    {
        $no = 1;
        $dataAkademik = null;

        foreach ($data as $val) {
            $id = $val['id_akademik'];
            $status = $val['status_akademik'];
            $dataAkademik .= "<tr>
                    <td>$no</td>
                    <td>$status</td>
                    <td>
                        <a href='akademik.php?action=edit&id=$id' class='btn btn-warning'>Edit</a>
                        <a href='akademik.php?action=delete&id=$id' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
        

        $tpl = new Template("templates/akademik.html");
        $tpl->replace("JUDUL", "Daftar Akademik");
        $tpl->replace("DATA_TABEL", $dataAkademik);
        $tpl->write();
    }

    public function renderForm($data = null)
    {
        $tpl = new Template("templates/akademik_form.html");
        
        // Set form values
        $tpl->replace("STATUS_VALUE", $data['status_akademik'] ?? '');
        $action = ($data && isset($data['id_akademik'])) ? 'edit' : 'add';
        $tpl->replace("FORM_ACTION", "akademik.php?action=$action");
        
        if ($data && isset($data['id_akademik'])) {
            $tpl->replace("HIDDEN_INPUT", "<input type='hidden' name='id' value='{$data['id_akademik']}'>");
            $tpl->replace("BUTTON_TEXT", "Update");
        } else {
            $tpl->replace("HIDDEN_INPUT", "");
            $tpl->replace("BUTTON_TEXT", "Tambah");
        }
        
        $tpl->write();
    }
}
