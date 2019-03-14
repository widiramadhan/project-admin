<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/lib/sweetalert/sweetalert.min.css">
<script src="assets/lib/sweetalert/sweetalert.min.js"></script>
<?php
require_once("config/connection.php");
$action = $_GET['action'];
if($action == 'save'){
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$status = $_POST['status'];
	$task = $_POST['task'];
		
	
	
	$queryInsert = "{call SP_INSERT_PROJECT(?,?,?,?,?,?,?)}"; 
	$parameterInsert = array(
					array($title, SQLSRV_PARAM_IN),
					array($desc, SQLSRV_PARAM_IN),
					array($category, SQLSRV_PARAM_IN),
					array($start_date, SQLSRV_PARAM_IN),
					array($end_date, SQLSRV_PARAM_IN),
					array($status, SQLSRV_PARAM_IN),
					array($task, SQLSRV_PARAM_IN)
				
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
						window.location.replace("index.php?page=project");
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
	else if($action == 'update'){
	$id=$_POST['id'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$status = $_POST['status'];
	$task = $_POST['task'];
	
	$queryUpdate = "{call SP_UPDATE_PROJECT_TEAM(?,?,?,?,?,?,?,?)}"; 
	$parameterUpdate = array(
					array($id, SQLSRV_PARAM_IN),
					array($title, SQLSRV_PARAM_IN),
					array($desc, SQLSRV_PARAM_IN),
					array($category, SQLSRV_PARAM_IN),
					array($start_date, SQLSRV_PARAM_IN),
					array($end_date, SQLSRV_PARAM_IN),
					array($status, SQLSRV_PARAM_IN),
					array($task, SQLSRV_PARAM_IN)
				);
	$execUpdate = sqlsrv_query( $conn, $queryUpdate, $parameterUpdate) or die( print_r( sqlsrv_errors(), true));
	if($execUpdate){
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Success",
						text : "Successfully update data",
						type: "success",
						timer: 2000,
						showConfirmButton: false
					});  
				},10); 
					window.setTimeout(function(){ 
						window.location.replace("index.php?page=project");
					} ,2000); 
			  </script>';
	}else{
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Error",
						text : "Failed update data",
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
	}else if($action == 'delete'){
	$id=$_GET['id'];
	$queryDelete = "{call SP_DELETE_PROJECT_TEAM(?)}"; 
	$parameterDelete = array(
					array($id, SQLSRV_PARAM_IN)
				);
	$execDelete = sqlsrv_query( $conn, $queryDelete, $parameterDelete) or die( print_r( sqlsrv_errors(), true));
	if($execDelete){
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Success",
						text : "Successfully delete data",
						type: "success",
						timer: 2000,
						showConfirmButton: false
					});  
				},10); 
					window.setTimeout(function(){ 
						window.location.replace("index.php?page=project");
					} ,2000); 
			  </script>';
	}else{
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Error",
						text : "Failed delete data",
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