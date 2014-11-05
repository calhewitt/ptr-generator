<?php

$generatorId = $_GET['id'];

function formatTime($itime) {
        //Slightly cheating, atom time includes milliseconds of fixed length
        return substr(date(DATE_ATOM, $itime), 0, -6);
}

$filename = "PtrFile_TDS1_LUCID_".str_replace(":", "", formatTime(time()))."_LUCID-PI.xml";

$ptrfile = file_get_contents("generated/".$generatorId.".ptr");

header("Content-disposition: attachment; filename={$filename}");
header('Content-type: text/xml');

echo $ptrfile;
?>
