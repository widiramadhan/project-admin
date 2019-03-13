<?php
$current_page = 'home';

if(array_key_exists('page',$_GET)) {
    $current_page = $_GET['page'];
}

switch ($current_page) {
	
	case 'home':
	require_once('home.php');
	break;
	
	case 'team':
	require_once('team.php');
	break;
	
	case 'project':
	require_once('project.php');
	break;
	
	case 'add-team':
	require_once('add-team.php');
	break;
		
	case 'team-setup':
	require_once('team-setup.php');
	break;
	
	default:
	require_once('404.php');
}

?>