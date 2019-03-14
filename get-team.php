<?php 
require_once("config/connection.php");

$project =  $_GET['project'];
$call = "{call SP_GET_PROJECT_TEAM_SETUP(?)}";
$params = array(
					array($project, SQLSRV_PARAM_IN)
				);
$exec = sqlsrv_query( $conn, $call, $params); 

$json = array();

do {
     while ($row = sqlsrv_fetch_array($exec, SQLSRV_FETCH_ASSOC)) {
     $json[] = $row;
     }
} while ( sqlsrv_next_result($exec) );

header('Content-Type: application/json');
echo json_encode($json);

sqlsrv_free_stmt( $exec);
sqlsrv_close( $conn);
?>