<?php

class usuarioController extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $users = DAOFactory::getUsersDAO()->queryAll();
        $this->getLibrary("excel" . DS . "PHPExcel");
        $excel = new PHPExcel();


        $excel->getProperties()->setCreator("Toquela.com")
                ->setLastModifiedBy("Toquela.com")
                ->setTitle("Usuarios registrados")
                ->setSubject("Usuarios registrados")
                ->setDescription("Usuarios registrados en la plataforma de toquela.com")
                ->setKeywords("office 2007 toquela usuarios ")
                ->setCategory("file users toquela");

        $excel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nombre')
                ->setCellValue('B1', 'Apellidos!')
                ->setCellValue('C1', 'Teléfono')
                ->setCellValue('D1', 'Dirección')
                ->setCellValue('E1', 'Ciudad')
                ->setCellValue('F1', 'Localidad')
                ->setCellValue('G1', 'Nombre de usuario')
                ->setCellValue('H1', 'Correo electrónico')
                ->setCellValue('I1', 'Género')
                ->setCellValue('J1', 'Edad');

        $i = 2;
        $user = new Users();
        foreach ($users as $user) {
            $excel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $user->name)
                    ->setCellValue('B' . $i, $user->lastname)
                    ->setCellValue('C' . $i, $user->phone)
                    ->setCellValue('D' . $i, $user->address)
                    ->setCellValue('E' . $i, $user->city)
                    ->setCellValue('F' . $i, $user->locality)
                    ->setCellValue('G' . $i, $user->username)
                    ->setCellValue('H' . $i, $user->email)
                    ->setCellValue('I' . $i, $user->sex)
                    ->setCellValue('J' . $i, $user->age);
            $i++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . time() . '.xls"');
        header('Cache-Control: max-age=0');

        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');
        exit;
        /* foreach ($users as $user) {

          }
          die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($users[0], true) .
          "</pre>"); */
    }

}

?>
