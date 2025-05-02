<?php
include_once("views/Template.class.php");

class StudentsView
{
    private $students;

    public function __construct()
    {
        $this->students = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function render($data)
    {
        $tpl = new Template("templates/students.html");
        
        $tableContent = '';
        $no = 1;
        foreach ($data as $row) {
            $tableContent .= "<tr>
                    <td>$no</td>
                    <td>{$row['name']}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['join_date']}</td>
                    <td>{$row['tingkat_prestasi']}</td>
                    <td>{$row['status_akademik']}</td>
                    <td>
                        <a href='students.php?action=edit&id={$row['id']}' class='btn btn-warning'>Edit</a>
                        <a href='students.php?action=delete&id={$row['id']}' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
            $no++;
        }

        $tpl->replace("DATA_TABEL", $tableContent);
        $tpl->write();
    }

    public function renderForm($data = null)
    {
        $tpl = new Template("templates/student_form.html");
        
        // Get options for dropdowns
        $this->students->open();
        
        // Prestasi options
        $prestasiResult = $this->students->getPrestasiOptions();
        $prestasiOptions = '';
        while ($row = $this->students->fetch($prestasiResult)) {
            $selected = ($data && $data['id_prestasi'] == $row['id_prestasi']) ? 'selected' : '';
            $prestasiOptions .= "<option value='{$row['id_prestasi']}' $selected>{$row['id_prestasi']} - {$row['tingkat_prestasi']}</option>";
        }
        
        // Akademik options
        $akademikResult = $this->students->getAkademikOptions();
        $akademikOptions = '';
        while ($row = $this->students->fetch($akademikResult)) {
            $selected = ($data && $data['id_akademik'] == $row['id_akademik']) ? 'selected' : '';
            $akademikOptions .= "<option value='{$row['id_akademik']}' $selected>{$row['id_akademik']} - {$row['status_akademik']}</option>";
        }
        
        $this->students->close();
        
        // Set form values
        $tpl->replace("NAME_VALUE", $data['name'] ?? '');
        $tpl->replace("NIM_VALUE", $data['nim'] ?? '');
        $tpl->replace("PHONE_VALUE", $data['phone'] ?? '');
        $tpl->replace("JOIN_DATE_VALUE", $data['join_date'] ?? date('Y-m-d'));
        $tpl->replace("PRESTASI_OPTIONS", $prestasiOptions);
        $tpl->replace("AKADEMIK_OPTIONS", $akademikOptions);
        $action = ($data && isset($data['id'])) ? 'edit' : 'add';
        $tpl->replace("FORM_ACTION", "students.php?action=$action");
        
        if ($data && isset($data['id'])) {
            $tpl->replace("HIDDEN_INPUT", "<input type='hidden' name='id' value='{$data['id']}'>");
            $tpl->replace("BUTTON_TEXT", "Update");
        } else {
            $tpl->replace("HIDDEN_INPUT", "");
            $tpl->replace("BUTTON_TEXT", "Tambah");
        }
        
        $tpl->write();
    }
}