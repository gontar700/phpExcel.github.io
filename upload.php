<?php

require_once "PHPExcel.php";
require_once "PHPExcel/IOFactory.php";
require_once "A.php";

$FileName = "files_" . $_FILES["file"]["name"];
$folder = getcwd() . "/files";

if (is_writable($folder))
    {
        if (!empty($_FILES["file"]["tmp_name"]) && is_dir($folder)) // not empty and ...
        {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $folder . "/files_" . $_FILES["file"]["name"]))
            {
                echo "<p>Your xls was uploaded!</p>";
                $fileType = 'Excel2007';
                $fileName = 'files/files_upload.xlsx';

                $objReader = PHPExcel_IOFactory::createReader($fileType);
                $objPHPExcel = $objReader->load($fileName);

                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

                $object = new daniel\A($sheetData);
                $object->p();
            }
            else
            {
                echo "<p>Your xls was not auploaded!</p>";
            }
        }
        else
        {

        }
    }
else
    {

    }
?>
