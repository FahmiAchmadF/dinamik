<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excel {

    private $objPHPExcel;

    public function __construct() {
        require_once APPPATH . 'third_party/PHPExcel.php';
        $this->objPHPExcel = new PHPExcel();
    }

    public function load($path) {
        $objPHPExcel = PHPExcel_IOFactory::createReader('Excel5');
        $this->objPHPExcel = $objPHPExcel->load($path);
    }

    public function save($path) {
        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
        $objWriter->save($path);
    }

    public function stream($filename, $data = null) {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:AB1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NILAI TUGAS SISWA SMK NEGERI 2 CIMAHI');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:AB2');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'TAHUN AJARAN 2014/2015');
        
        //Semi-header... or actually header
        $objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'MATA PELAJARAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', $data[0]['nama_mapel']);
        $objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
        $objPHPExcel->getActiveSheet()->setCellValue('A4', 'TINGKAT : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', $data[0]['tingkat']);
        $objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
        $objPHPExcel->getActiveSheet()->setCellValue('A5', 'JURUSAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C5', $data[0]['jurusan']);
        $objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'KELAS : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', $data[0]['kelas']);
        $objPHPExcel->getActiveSheet()->getStyle('A3:B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('W4', 'SEMESTER : ');
        $objPHPExcel->getActiveSheet()->setCellValue('Z4', $data[0]['semester']);
        $objPHPExcel->getActiveSheet()->setCellValue('W5', 'TAHUN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('Z5', $data[0]['tahun_ajaran']);

        //Table Header Styling
        $objPHPExcel->getActiveSheet()->getStyle('A1:AE8')->getFont()->setName('Arial');
        $objPHPExcel->getActiveSheet()->getStyle('A1:AE8')->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AE8')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AE2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Table Header Bordering
        $sharedStyle1 = new PHPExcel_Style();
        $sharedStyle2 = new PHPExcel_style();

        $sharedStyle1->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                    'bold' => true,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A8:AE9");

        //Dimension Sizing
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(10.57);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(3);

        //Header Part Ends Here
        //
        //---------------------------------------
        //
        //Table Part Starts Here
        //
        //Header Table Starts Here
        $objPHPExcel->getActiveSheet()->mergeCells('A8:A9');
        $objPHPExcel->getActiveSheet()->setCellValue('A8', 'NO');
        $objPHPExcel->getActiveSheet()->mergeCells('B8:B9');
        $objPHPExcel->getActiveSheet()->setCellValue('B8', 'NAMA');
        $objPHPExcel->getActiveSheet()->mergeCells('C8:C9');
        $objPHPExcel->getActiveSheet()->setCellValue('C8', 'NISN');
        $objPHPExcel->getActiveSheet()->mergeCells('D8:D9');
        $objPHPExcel->getActiveSheet()->setCellValue('D8', 'L/P');
        $objPHPExcel->getActiveSheet()->mergeCells('E8:AB8');
        $objPHPExcel->getActiveSheet()->setCellValue('E8', 'Tugas');
        $objPHPExcel->getActiveSheet()->mergeCells('AC8:AE9');
        $objPHPExcel->getActiveSheet()->setCellValue('AC8', 'Jumlah');
        $objPHPExcel->getActiveSheet()->mergeCells('E9:F9');
        $objPHPExcel->getActiveSheet()->setCellValue('E9', '1');
        $objPHPExcel->getActiveSheet()->mergeCells('G9:H9');
        $objPHPExcel->getActiveSheet()->setCellValue('G9', '2');
        $objPHPExcel->getActiveSheet()->mergeCells('I9:J9');
        $objPHPExcel->getActiveSheet()->setCellValue('I9', '3');
        $objPHPExcel->getActiveSheet()->mergeCells('K9:L9');
        $objPHPExcel->getActiveSheet()->setCellValue('K9', '4');
        $objPHPExcel->getActiveSheet()->mergeCells('M9:N9');
        $objPHPExcel->getActiveSheet()->setCellValue('M9', '5');
        $objPHPExcel->getActiveSheet()->mergeCells('O9:P9');
        $objPHPExcel->getActiveSheet()->setCellValue('O9', '6');
        $objPHPExcel->getActiveSheet()->mergeCells('Q9:R9');
        $objPHPExcel->getActiveSheet()->setCellValue('Q9', '7');
        $objPHPExcel->getActiveSheet()->mergeCells('S9:T9');
        $objPHPExcel->getActiveSheet()->setCellValue('S9', '8');
        $objPHPExcel->getActiveSheet()->mergeCells('U9:V9');
        $objPHPExcel->getActiveSheet()->setCellValue('U9', '9');
        $objPHPExcel->getActiveSheet()->mergeCells('W9:X9');
        $objPHPExcel->getActiveSheet()->setCellValue('W9', '10');
        $objPHPExcel->getActiveSheet()->mergeCells('Y9:Z9');
        $objPHPExcel->getActiveSheet()->setCellValue('Y9', '11');
        $objPHPExcel->getActiveSheet()->mergeCells('AA9:AB9');
        $objPHPExcel->getActiveSheet()->setCellValue('AA9', '12');
        $objPHPExcel->getActiveSheet()->getStyle('A8:AE9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A8:AE9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //Table Header Ends Here
        //
        //Table Body Writing Starts Here
        // $to_excel_data = Array();
        $no=0;
        $nom=10;
        for($i=0;$i<count($data);$i++)
        {
            $no++;

            //Table Data
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$nom, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$nom, $data[$i]['nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$nom, $data[$i]['nisn']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$nom, $data[$i]['jenis_kelamin']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$nom, $data[$i]['tes_1']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$nom, $data[$i]['tes_2']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$nom, $data[$i]['tes_3']);
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$nom, $data[$i]['tes_4']);
            $objPHPExcel->getActiveSheet()->setCellValue('M'.$nom, $data[$i]['tes_5']);
            $objPHPExcel->getActiveSheet()->setCellValue('O'.$nom, $data[$i]['tes_6']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q'.$nom, $data[$i]['tes_7']);
            $objPHPExcel->getActiveSheet()->setCellValue('S'.$nom, $data[$i]['tes_8']);
            $objPHPExcel->getActiveSheet()->setCellValue('U'.$nom, $data[$i]['tes_9']);
            $objPHPExcel->getActiveSheet()->setCellValue('W'.$nom, $data[$i]['tes_10']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y'.$nom, $data[$i]['tes_11']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA'.$nom, $data[$i]['tes_12']);

            //Average Formula
            $objPHPExcel->getActiveSheet()->setCellValue('AC'.$nom, '=AVERAGE(E'.$nom.':AA'.$nom.')');            

            //Test Merging
            $objPHPExcel->getActiveSheet()->mergeCells("Y$nom:AB$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("E$nom:F$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("G$nom:H$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("I$nom:J$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("K$nom:L$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("M$nom:N$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("O$nom:P$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("Q$nom:R$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("S$nom:T$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("U$nom:V$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("W$nom:X$nom");
            $nom++;
        }
        $nox=$no+10;
        // $objPHPExcel->getActiveSheet()->fromArray($to_excel_data, NULL, 'A9');
        //Bordering Starts Here
        $sharedStyle2->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A10:AB$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("Y$nox:AB$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("E$nox:F$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("G$nox:H$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("I$nox:J$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("K$nox:L$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("M$nox:N$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("O$nox:P$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("Q$nox:R$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("S$nox:T$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("U$nox:V$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("W$nox:X$nox");
        // Table Body Writing Ends Here
        //
        // Table Footer Starts Here
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+4), 'Mengetahui,');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+5), 'Kepala Sekolah');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+8), 'Drs. Mulyono, M.Pd');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+9), 'NIP. 19600980 198503 1 019');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+4), 'Cimahi, …………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+5), 'Guru Mata Pelajaran');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+8), '……………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+9), 'NIP.'.$data[0]['nip']);

        //Table Footer Styling
        $sharedStyle3 = new PHPExcel_style();
        $sharedStyle3->applyFromArray(
            array(
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A".($nox+4).":AB".($nox+9));
        $objPHPExcel->getActiveSheet()->getStyle('A'.($nox+8))->getFont()->setBold(true);
        //Table Footer Ends Here
        //-------------------------------------------------- Excel Writing Ends Here

        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function import_nilai_excel($filename, $data = null) {
        $objPHPExcel = new PHPExcel();


        //-------------------------------------------------- Excel Writing Starts Here
        //
        
        //Header Part Starts Here 
        
        //Title, biatch
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:AB1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NILAI TUGAS SISWA SMK NEGERI 2 CIMAHI');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:AB2');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'TAHUN AJARAN 2014/2015');
        
        //Semi-header... or actually header
        $objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'MATA PELAJARAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', $data[0]['nama_mapel']);
        $objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
        $objPHPExcel->getActiveSheet()->setCellValue('A4', 'TINGKAT : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', $data[0]['tingkat']);
        $objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
        $objPHPExcel->getActiveSheet()->setCellValue('A5', 'JURUSAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C5', $data[0]['jurusan']);
        $objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'KELAS : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', $data[0]['kelas']);

        $objPHPExcel->getActiveSheet()->getStyle('A3:B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('W4', 'SEMESTER : ');
        $objPHPExcel->getActiveSheet()->setCellValue('Z4', $data[0]['semester']);
        $objPHPExcel->getActiveSheet()->setCellValue('W5', 'TAHUN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('Z5', $data[0]['tahun_ajaran']);

        //Table Header Styling
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB8')->getFont()->setName('Arial');
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB8')->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB8')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Table Header Bordering
        $sharedStyle1 = new PHPExcel_Style();
        $sharedStyle2 = new PHPExcel_style();

        $sharedStyle1->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                    'bold' => true,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A8:AB9");

        //Dimension Sizing
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(10.57);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5.71);

        //Header Part Ends Here
        //
        //---------------------------------------
        //
        //Table Part Starts Here
        //
        //Header Table Starts Here
        $objPHPExcel->getActiveSheet()->mergeCells('A8:A9');
        $objPHPExcel->getActiveSheet()->setCellValue('A8', 'NO');
        $objPHPExcel->getActiveSheet()->mergeCells('B8:B9');
        $objPHPExcel->getActiveSheet()->setCellValue('B8', 'NAMA');
        $objPHPExcel->getActiveSheet()->mergeCells('C8:C9');
        $objPHPExcel->getActiveSheet()->setCellValue('C8', 'NISN');
        $objPHPExcel->getActiveSheet()->mergeCells('D8:D9');
        $objPHPExcel->getActiveSheet()->setCellValue('D8', 'L/P');
        $objPHPExcel->getActiveSheet()->mergeCells('E8:AB9');
        $objPHPExcel->getActiveSheet()->setCellValue('E8', 'Tugas');
        $objPHPExcel->getActiveSheet()->getStyle('A8:AB9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A8:AB9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //Table Header Ends Here
        //
        //Table Body Writing Starts Here
        $no=0;
        $nom=10;
        for($i=0;$i<count($data);$i++)
        {
            $no++;

            //Table Data
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$nom, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$nom, $data[$i]['nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$nom, $data[$i]['nisn']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$nom, $data[$i]['jenis_kelamin']);          

            //Test Merging
            $objPHPExcel->getActiveSheet()->mergeCells("E$nom:AB$nom");
            $nom++;
        }
        $nox=$no+10;
        // $objPHPExcel->getActiveSheet()->fromArray($to_excel_data, NULL, 'A9');
        //Bordering Starts Here
        $sharedStyle2->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A10:AB$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("E$nox:AB$nox");
        $objPHPExcel->getActiveSheet()->getStyle('c'.$nom)->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);

        // Table Body Writing Ends Here
        //
        // Table Footer Starts Here
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+4), 'Mengetahui,');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+5), 'Kepala Sekolah');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+8), 'Drs. Mulyono, M.Pd');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+9), 'NIP. 19600980 198503 1 019');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+4), 'Cimahi, ……………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+5), 'Guru Mata Pelajaran');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+8), '……………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+9), 'NIP.'.$data[0]['nip']);
        //$data[0]['nip']
        

        //Table Footer Styling
        $sharedStyle3 = new PHPExcel_style();
        $sharedStyle3->applyFromArray(
            array(
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A".($nox+4).":AB".($nox+9));
        $objPHPExcel->getActiveSheet()->getStyle('A'.($nox+8))->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('u'.($nox+9))->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
        //Table Footer Ends Here
        //-------------------------------------------------- Excel Writing Ends Here

        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function wali_kelas_out($filename, $data = null){
        $objPHPExcel = new PHPExcel();
        // if ($data != null) {
        //     $col = 'A';
        //     foreach ($data[0] as $key => $val) {
        //         $objRichText = new PHPExcel_RichText();
        //         $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
        //         $objPHPExcel->getActiveSheet()->getCell($col . '2')->setValue($objRichText);
        //         $col++;
        //     }
        //     $rowNumber = 3;
        //     foreach ($data as $row) {
        //         $col = 'A';
        //         foreach ($row as $cell) {
        //             $objPHPExcel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
        //             $col++;
        //         }
        //         $rowNumber++;
        //     }
        // }

        //-----------------------------Excel Writing Starts Here
        //Header Part Starts Here
        // Title
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:AB1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'LAPORAN PENILAIAN HASIL BELAJAR SISWA SMK NEGERI 2 CIMAHI ');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:AB2');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'TAHUN AJARAN '.$data[0]['tahun_ajaran']);

        // Semi-Header
        $objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
        $objPHPExcel->getActiveSheet()->setCellValue('A4', 'NISN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', $data[0]['nisn']);
        $objPHPExcel->getActiveSheet()->getStyle('A4')->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
        $objPHPExcel->getActiveSheet()->getStyle('C4')->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
        $objPHPExcel->getActiveSheet()->setCellValue('A5', 'NAMA SISWA : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C5', $data[0]['nama']);
        $objPHPExcel->getActiveSheet()->mergeCells('A7:B7');
        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'NAMA GURU : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', $data[0]['nama_guru']);
        $objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
        $objPHPExcel->getActiveSheet()->getStyle('A4:B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('D4', 'TINGKAT : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E4', $data[0]['tingkat']);
        $objPHPExcel->getActiveSheet()->setCellValue('D5', 'JURUSAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E5', $data[0]['jurusan']);
        $objPHPExcel->getActiveSheet()->setCellValue('D6', 'KELAS : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E6', $data[0]['kelas']);
        $objPHPExcel->getActiveSheet()->getStyle('D4:D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('Q4', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('Z4', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA4', $data[0]['tgl']);
        $objPHPExcel->getActiveSheet()->getStyle('AA4')->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
        $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'SEMESTER');
        $objPHPExcel->getActiveSheet()->setCellValue('Z6', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA6', $data[0]['semester']);
        $objPHPExcel->getActiveSheet()->setCellValue('Q7', 'TAHUN');
        $objPHPExcel->getActiveSheet()->setCellValue('Z7', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA7', $data[0]['tahun_ajaran']);

        //Header Styling
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setName('Arial');
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Header Part Ends Here

        //Table Header Starts Here
        $objPHPExcel->getActiveSheet()->mergeCells('A10:A11');
        $objPHPExcel->getActiveSheet()->setCellValue('A10', 'NO');
        $objPHPExcel->getActiveSheet()->mergeCells('B10:D11');
        $objPHPExcel->getActiveSheet()->setCellValue('B10', 'MATA PELAJARAN');
        $objPHPExcel->getActiveSheet()->mergeCells('E10:AB11');
        $objPHPExcel->getActiveSheet()->setCellValue('E10', 'NILAI');

        //Table Header Styling + Bordering
        $sharedStyle1 = new PHPExcel_Style();
        $sharedStyle1->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A10:AB12");

        //Dimension Sizing
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5.71);
        //Table Header Ends Here
        //
        //Table Body Writing Starts Here
        $no=0;
        $nom=12;
        for($i=0;$i<count($data);$i++)
        {
            $no++;

            //Table Data
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$nom, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$nom, $data[$i]['nama_mapel']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$nom, $data[$i]['p_nilai']);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$nom)->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);

            //Merging
            $objPHPExcel->getActiveSheet()->mergeCells("B$nom:D$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("E$nom:AB$nom");

            $nom++;
        }
        $nox=$no+12;
        //Bordering Starts Here
        $sharedStyle2 = new PHPExcel_Style();
        $sharedStyle2->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A12:AB$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("B$nox:D$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("E$nox:AB$nox");
        //Table Body Writing Ends Here
        //
        //Table Footer Starts Here
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+4), 'Mengetahui,');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+5), 'Wali Kelas');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+8), '……………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+9), 'NIP.');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+4), 'Cimahi, …………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+5), 'Orang Tua/Wali Murid');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+8), '……………………………………………');


        //Table Footer Styling
        $sharedStyle3 = new PHPExcel_style();
        $sharedStyle3->applyFromArray(
            array(
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A".($nox+4).":AB".($nox+9));
        //Table Footer Ends Here

        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function wali_kelas_in($filename, $data = null){
        $objPHPExcel = new PHPExcel();

        //-----------------------------Excel Writing Starts Here
        //Header Part Starts Here
        // Title
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:AB1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'LAPORAN PENILAIAN HASIL BELAJAR SISWA SMK NEGERI 2 CIMAHI ');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:AB2');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'TAHUN AJARAN '.$data[0]['tahun_ajaran']);

        // Semi-Header
        $objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
        $objPHPExcel->getActiveSheet()->setCellValue('A4', 'NISN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C4', '');
        $objPHPExcel->getActiveSheet()->getStyle('A4')->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
        $objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
        $objPHPExcel->getActiveSheet()->setCellValue('A5', 'NAMA SISWA : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C5', '');
        $objPHPExcel->getActiveSheet()->mergeCells('A7:B7');
        $objPHPExcel->getActiveSheet()->setCellValue('A6', 'NAMA GURU : ');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', '');
        $objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
        $objPHPExcel->getActiveSheet()->getStyle('A4:B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('D4', 'TINGKAT : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E4', $data[0]['tingkat']);
        $objPHPExcel->getActiveSheet()->setCellValue('D5', 'JURUSAN : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E5', $data[0]['jurusan']);
        $objPHPExcel->getActiveSheet()->setCellValue('D6', 'KELAS : ');
        $objPHPExcel->getActiveSheet()->setCellValue('E6', $data[0]['kelas']);
        $objPHPExcel->getActiveSheet()->getStyle('D4:D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        $objPHPExcel->getActiveSheet()->setCellValue('Q4', 'Tanggal');
        $objPHPExcel->getActiveSheet()->setCellValue('Z4', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA4', '');
        $objPHPExcel->getActiveSheet()->getStyle('AA4')->getNumberFormat()
        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);
        $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'SEMESTER');
        $objPHPExcel->getActiveSheet()->setCellValue('Z6', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA6', '');
        $objPHPExcel->getActiveSheet()->setCellValue('Q7', 'TAHUN');
        $objPHPExcel->getActiveSheet()->setCellValue('Z7', ':');
        $objPHPExcel->getActiveSheet()->setCellValue('AA7', '');

        //Header Styling
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setName('Arial');
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB7')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:AB2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Header Part Ends Here

        //Table Header Starts Here
        $objPHPExcel->getActiveSheet()->mergeCells('A10:A11');
        $objPHPExcel->getActiveSheet()->setCellValue('A10', 'NO');
        $objPHPExcel->getActiveSheet()->mergeCells('B10:D11');
        $objPHPExcel->getActiveSheet()->setCellValue('B10', 'MATA PELAJARAN');
        $objPHPExcel->getActiveSheet()->mergeCells('E10:AB11');
        $objPHPExcel->getActiveSheet()->setCellValue('E10', 'NILAI');

        //Table Header Styling + Bordering
        $sharedStyle1 = new PHPExcel_Style();
        $sharedStyle1->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A10:AB12");

        //Dimension Sizing
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(3);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5.71);

        //Table Header Ends Here
        //
        //Table Body Writing Starts Here
        $no=0;
        $nom=12;
        for($i=0;$i<count($data);$i++)
        {
            $no++;
            //Table Data
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$nom, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$nom, $data[$i]['nama_mapel']);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$nom)->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);

            //Merging
            $objPHPExcel->getActiveSheet()->mergeCells("B$nom:D$nom");
            $objPHPExcel->getActiveSheet()->mergeCells("E$nom:AB$nom");

            $nom++;
        }
        $nox=$no+11;
        //Bordering Starts Here
        $sharedStyle2 = new PHPExcel_Style();
        $sharedStyle2->applyFromArray(
            array(
                'borders' => array(
                    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                ),
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A12:AB$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("B$nox:D$nox");
        $objPHPExcel->getActiveSheet()->mergeCells("E$nox:AB$nox");
        //Table Body Writing Ends Here
        //
        //Table Footer Starts Here
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+4), 'Mengetahui,');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+5), 'Wali Kelas');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+8), '……………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($nox+9), 'NIP.'.$data[0]['nip']);
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+4), 'Cimahi, …………………………………………');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+5), 'Orang Tua/Wali Murid');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.($nox+8), '……………………………………………');


        //Table Footer Styling
        $sharedStyle3 = new PHPExcel_style();
        $sharedStyle3->applyFromArray(
            array(
                'font' => array(
                    'name' => 'Arial',
                    'size' => 12,
                ),
            )
        );
        $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A".($nox+4).":AB".($nox+9));
        //Table Footer Ends Here

        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function __call($name, $arguments) {
        if (method_exists($this->objPHPExcel, $name)) {
            return call_user_func_array(array($this->objPHPExcel, $name), $arguments);
        }
        return null;
    }
}