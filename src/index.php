<?php

require '../vendor/autoload.php';
require_once 'db.php';

use Dompdf\Dompdf;
use Petrik\Pdf\Tiger;

$tigerAdatok = Tiger::osszes();

$dompdf = new Dompdf();

$asd = "Szalai Szabolcs Állatkert";


foreach($tigerAdatok as $t) {
   $asd .= "<p>" . $t -> toString() . "</p>";
    /* $dompdf->loadHtml($t -> getNev());
    $dompdf->loadHtml($t -> getTulajdonosNeve());
    $dompdf->loadHtml($t -> getOrokbefogadasDatuma() -> format('Y-m-d')); */
}

$dompdf->loadHtml($asd);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();