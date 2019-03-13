<script src="assets/js/jquery.min.js"></script>
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
if($action == 'save-setup'){
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
?>