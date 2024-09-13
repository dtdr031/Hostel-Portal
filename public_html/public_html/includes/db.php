<?php
ob_start();
?>
<?php

//establishing a database connection with the portal database
//
$db['db_host'] = "localhost";
$db['db_user'] = "id12394803_devdemons";
$db['db_pass'] = "devdemons";
$db['db_name'] = "id12394803_hostel_portal";


//  $db['db_host'] = "localhost";
//  $db['db_user'] = "root";
//  $db['db_pass'] = "";
//  $db['db_name'] = "id12394803_hostel_portal";

 foreach($db as $key => $value){
 define(strtoupper($key), $value);
 }

 $connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

 if(!$connection)
 {
     echo "there is no connection";
 }
// else
// {
//     echo "we are connected";
// }
?>
