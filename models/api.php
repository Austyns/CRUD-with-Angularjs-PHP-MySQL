<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once("functions.php") ;

	$action = $_GET['action'] ;
	$errors = array();
	$data = array();
	// Getting posted data and decodeing json
	$_POST = json_decode(file_get_contents('php://input'), true);

	if ($action == 'add' ) {

		// checking for blank values.
		if (empty($_POST['task_name']))
		  $errors['task_name'] = 'Task is required.';

		if (empty($_POST['due_date']))
		  $errors['due_date'] = 'Due date is required';

		// if no errors 

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {
		  // $data['message'] = 'Form data is going well';
			// print_r($_POST) ;
			// die() ;
			if (AddTodo($db,$_POST['task_name'],'pending',$datetime,$_POST['due_date'])== true) {
					
			  $data['message'] = "Application  was successful" ;
			}
			else{
			  $data['message'] = 'Application was Unsuccessful';
				}
			}
				// response back.
				echo json_encode($data); 
		}
	// Checks and hanles Get Requests 
	}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
		require_once("functions.php") ;


	    header('Content-Type: application/json');

		if ($_GET['obj'] == "GetTodo") {
			return	GetTasks($db) ;
		}

	// Checks and hanles Put Requests for updattes
	}elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

		require_once("functions.php") ;

	    header('Content-Type: application/json');

		$obj = $_GET['action'] ;

		if ($obj == 'update') {

		$errors = array();
		$data = array();
		// Getting posted data and decodeing json
		$_PUT = json_decode(file_get_contents('php://input'), true);

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {
			// echo "$_PUT";
			// exit();

			if (FinishTodo($db,$_PUT) == true) {
					
			  $data['message'] = "Update  was successful" ;
			}
			else{
			  $data['message'] = 'Update was Unsuccessful';
			 }
			}
				// response back.
				echo json_encode($data); 
		}

	}
elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

		require_once("functions.php") ;

	    header('Content-Type: application/json');

		$obj = $_GET['action'] ;

		if ($obj == 'delete') {

		$errors = array();
		$data = array();
		// Getting posted data and decodeing json
		$_DELETE = json_decode(file_get_contents('php://input'), true);

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {
			// echo "$_PUT";
			// exit();

			if (DeleteTodo($db,$_DELETE) == true) {
					
			  $data['message'] = "Successfully Deleted" ;
			}
			else{
			  $data['message'] = 'Unsuccessful';
			 }
			}
				// response back.
				echo json_encode($data); 
		}

	}



