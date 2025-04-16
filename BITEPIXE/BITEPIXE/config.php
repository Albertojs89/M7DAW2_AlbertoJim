<?php
$host='mysql-albertojs89.alwaysdata.net';
$dbname='albertojs89_bitepixe';
$username='398212';
$password='jesylane89'; 

$mysqli=new mysqli($host,$username,$password,$dbname);

if($mysqli->connect_error){
    die('Error: '.$mysqli->connect_error);
}