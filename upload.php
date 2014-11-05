<?php

$generatorId = $_GET['id'];

function formatTime($itime) {
        //Slightly cheating, atom time includes milliseconds of fixed length
        return substr(date(DATE_ATOM, $itime), 0, -6);
}

$filename = "PtrFile_TDS1_LUCID_".str_replace(":", "", formatTime(time()))."_LUCID-PI.xml";

$ptrfile = file_get_contents("generated/".$generatorId.".ptr");

file_put_contents("outgoing-ptrs/".$filename, $ptrFile);

$ptrFileId = trim(file_get_contents("ptr-file-id.log"));
$ptrFileId++;
file_put_contents("ptr-file-id.log", $ptrFileId);

$ptrId = trim(file_get_contents("generated/".$generatorId.".ptrmeta"));
file_put_contents("ptr-id.log", $ptrId);

print "PTR set to upload!";

$db = new SQLite3('db/ptr.db');
$db->exec("UPDATE log SET uploaded='true' WHERE GENERATOR_ID = '" . $generatorId . "';");
print "<br>";
print "Database records updated";

?>
