<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/lib/sweetalert/sweetalert.min.css">
<script src="assets/lib/sweetalert/sweetalert.min.js"></script>
<?php
require_once("config/connection.php");
$action = $_GET['action'];
if($action == 'save'){
	$name = $_POST['name'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$nohp = $_POST['nohp'];
	$img=$_FILES['img']['name'];
	
	$temp = explode(".", $_FILES["img"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
	$nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
	
	$queryInsert = "{call SP_INSERT_TEAM(?,?,?,?,?)}"; 
	$parameterInsert = array(
					array($name, SQLSRV_PARAM_IN),
					array($job, SQLSRV_PARAM_IN),
					array($email, SQLSRV_PARAM_IN),
					array($nohp, SQLSRV_PARAM_IN),
					array($nama_baru, SQLSRV_PARAM_IN)
				);
	$execInsert = sqlsrv_query( $conn, $queryInsert, $parameterInsert) or die( print_r( sqlsrv_errors(), true));
	if($execInsert){
		copy($_FILES['img']['tmp_name'], "assets/images/team/".$nama_baru);
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
						window.location.replace("index.php?page=team");
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
//Save team setup
require_once("config/connection.php");
$action = $_GET['action'];
if($action == 'update'){
	$id= $_POST['id'];
	$name = $_POST['name'];
	$posistion = $_POST['posistion'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$img=$_FILES['img']['name'];
	
	$temp = explode(".", $_FILES["img"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
	$nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
	
	$queryUpdate = "{call SP_UPDATE_TEAM(?,?,?,?,?,?)}"; 
	$parameterUpdate = array(
					array($id, SQLSRV_PARAM_IN),
					array($name, SQLSRV_PARAM_IN),
					array($posistion, SQLSRV_PARAM_IN),
					array($email, SQLSRV_PARAM_IN),
					array($phone, SQLSRV_PARAM_IN),
					array($nama_baru, SQLSRV_PARAM_IN)
				);
	$execUpdate = sqlsrv_query( $conn, $queryUpdate, $parameterUpdate) or die( print_r( sqlsrv_errors(), true));
	if($execUpdate){
		copy($_FILES['img']['tmp_name'], "assets/images/team/".$nama_baru);
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
						window.location.replace("index.php?page=team");
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
 }else if($action == 'delete'){// DELETE TEAM ID
	$id= $_GET['id'];		
	$queryDelete = "{call SP_DELETE_TEAM(?)}"; 
	$parameterDelete = array(
					array($id, SQLSRV_PARAM_IN)					
				);
	$execDelete = sqlsrv_query( $conn, $queryDelete, $parameterDelete) or die( print_r( sqlsrv_errors(), true));
	if($execDelete){
		
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Success",
						text : "Successfully Delete data",
						type: "success",
						timer: 2000,
						showConfirmButton: false
					});  
				},10); 
					window.setTimeout(function(){ 
						window.location.replace("index.php?page=team");
					} ,2000); 
			  </script>';
	}else{
		echo '<script>
				setTimeout(function() {
					swal({
						title : "Error",
						text : "Failed Delete data",
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

//Save team setup
require_once("config/connection.php");
$action = $_GET['action'];
if($action == 'save-setup'){
	$project_name = $_POST['project_name'];
	$teams = $_POST['teams'];
	$selectedTeam = count($teams);
	for($x=0;$x<$selectedTeam;$x++){
	$queryInsert = "{call SP_INSERT_TEAM_MAPPING(?,?)}"; 
	$parameterInsert = array(
					array($project_name, SQLSRV_PARAM_IN),
					array($teams[$x], SQLSRV_PARAM_IN)
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
						window.location.replace("index.php?page=team");
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
}else if ($action == 'save-setup1'){
	$id = $_POST['id'];
	$teams = $_POST['teams'];
	$selectedTeam = count($teams);
	for($x=0;$x<$selectedTeam;$x++){
	$queryInsert = "{call SP_INSERT_TEAM_MAPPING(?,?)}"; 
	$parameterInsert = array(
					array($id, SQLSRV_PARAM_IN),
					array($teams[$x], SQLSRV_PARAM_IN)
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
}

?>