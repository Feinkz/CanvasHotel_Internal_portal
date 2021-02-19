<?php
$dbhostms = "localhost";
$dbusernamems = "root";
$dbpassms = "Opelastra1993";
$dbnamems = "canvas";
$dbhost = "10.10.20.18/MCRSPOS";
$dbusername = "microsdb";
$dbpass = "microsdb";
$dbhostopera = "10.10.20.15/OPERA";
$dbusernameopera = "opera";
$dbpassopera = "opera";


$connection = new mysqli($dbhostms, $dbusernamems, $dbpassms, $dbnamems);
if ($connection-> connect_error) die ($connection->connect_error);

$dbconnect = oci_connect($dbusername, $dbpass, $dbhost);
$dbconnectopera = oci_connect($dbusernameopera, $dbpassopera, $dbhostopera);

function queryMysql ($query)
{
	global $connection;
    mysqli_set_charset($connection, 'utf8');
	$result=$connection->query($query);
	if (!$result) die($connection->error);
	return $result;
}

function queryOCI ($queryoci)
{
    global $dbconnect;
    $stidoci=oci_parse($dbconnect, $queryoci);
    return $stidoci;
}

function queryOCIopera ($queryociopera)
{
    global $dbconnectopera;
    $stidociopera = oci_parse($dbconnectopera, $queryociopera);
    return $stidociopera;
}
?>