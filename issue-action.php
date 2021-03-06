<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/lib/sweetalert/sweetalert.min.css">
<script src="assets/lib/sweetalert/sweetalert.min.js"></script>
<?php
require_once("config/connection.php");
$action = $_GET['action'];
if($action == 'save'){
	$project_name = $_POST['project_name'];
	$issue_type = $_POST['issue_type'];
	$divisi = $_POST['divisi'];
	$classification = $_POST['classification'];
	$iss_name = $_POST['iss_name'];
	$iss_desc = $_POST['iss_desc'];
	$issue_date = $_POST['issue_date'];
	$level = $_POST['level'];
	$pic = $_POST['pic'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$status = $_POST['status'];
	$checkby = $_POST['checkby'];
	
	$queryInsert = "{call SP_INSERT_ISSUE(?,?,?,?,?,?,?,?,?,?,?,?,?)}"; 
	$parameterInsert = array(
					array($project_name, SQLSRV_PARAM_IN),
					array($issue_type, SQLSRV_PARAM_IN),
					array($divisi, SQLSRV_PARAM_IN),
					array($classification, SQLSRV_PARAM_IN),
					array($iss_name, SQLSRV_PARAM_IN),
					array($iss_desc, SQLSRV_PARAM_IN),
					array($issue_date, SQLSRV_PARAM_IN),
					array($level, SQLSRV_PARAM_IN),
					array($pic, SQLSRV_PARAM_IN),
					array($start_date, SQLSRV_PARAM_IN),
					array($end_date, SQLSRV_PARAM_IN),
					array($status, SQLSRV_PARAM_IN),
					array($checkby, SQLSRV_PARAM_IN)
				);
	$execInsert = sqlsrv_query( $conn, $queryInsert, $parameterInsert) or die( print_r( sqlsrv_errors(), true));
	if($execInsert){
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Success",
						text : "Successfully saved data",
						type: "success",
						timer: 2000,
						showConfirmButton: false
					});  
				},10); 
					window.setTimeout(function(){ 
						window.location.replace("index.php?page=requst");
					} ,2000); 
			  </script>';
	}else{
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Error",
						text : "Failed saved data",
						type: "error",
						timer: 2000,
						showConfirmButton: false
					});  
				},10); 
					window.setTimeout(function(){ 
						history.back();
					} ,2000); 
			  </script>';
	}	
}
?>