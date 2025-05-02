<?php
include_once("views/Template.class.php");

class PrestasiView
{
    private $prestasi;

    public function __construct()
    {
        $this->prestasi = new Prestasi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function render($data)
    {
        $no = 1;
        $dataPrestasi = null;

        foreach ($data as $val) {
            $id = $val['id_prestasi'];
            $tingkat = $val['tingkat_prestasi'];
            $dataPrestasi .= "<tr>
                    <td>$no</td>
                    <td>$tingkat</td>
                    <td>
                        <a href='prestasi.php?action=edit&id=$id' class='btn btn-warning'>Edit</a>
                        <a href='prestasi.php?action=delete&id=$id' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
        

        $tpl = new Template("templates/prestasi.html");
        $tpl->replace("JUDUL", "Daftar Prestasi");
        $tpl->replace("DATA_TABEL", $dataPrestasi);
        $tpl->write();
    }

    public function renderForm($data = null)
    {
        $tpl = new Template("templates/prestasi_form.html");
        
        // Set form values
        $tpl->replace("TINGKAT_VALUE", $data['tingkat_prestasi'] ?? '');
        $action = ($data && isset($data['id_prestasi'])) ? 'edit' : 'add';
        $tpl->replace("FORM_ACTION", "prestasi.php?action=$action");
        
        if ($data && isset($data['id_prestasi'])) {
            $tpl->replace("HIDDEN_INPUT", "<input type='hidden' name='id' value='{$data['id_prestasi']}'>");
            $tpl->replace("BUTTON_TEXT", "Update");
        } else {
            $tpl->replace("HIDDEN_INPUT", "");
            $tpl->replace("BUTTON_TEXT", "Tambah");
        }
        
        $tpl->write();
    }
}