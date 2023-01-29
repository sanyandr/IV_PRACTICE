<?php
#SQL-request
namespace db;
use db\dbFunctions\dbFunctions;
use db\SQLiteConnection\SQLiteConnection;
use PDO;

require __DIR__ . '/../../vendor/autoload.php';
//
//$state = (new SQLiteConnection())->Connect()->query("SELECT * FROM review ");
//$rows = $state->fetchAll(PDO::FETCH_ASSOC);

////$result = (new dbFunctions())->getByID(2);
//$array = (new dbFunctions())->getLimited();
//foreach ($array as $value) {
//    echo("<pre>");
//    print_r($value);
//    echo("</pre>");
//}
