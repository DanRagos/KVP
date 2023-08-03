<?php
session_start();
require_once '../classes/auth.php';
require_once '../classes/tools.php';
require_once '../classes/clients.php';

$cuser = new Auth ();
$tool = new Tool ();
$client = new Clients ();
if (!isset($_SESSION['user'])){
	header('location:../index.php');
	die;
}
$username = $_SESSION['user'];
$data = $cuser ->currentUser($username);
$id = $data['mem_id'];
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$email = $data['email'];
$username = $data['username'];
$type = $data['type'];
$img = $data['imglink'];
$coverPhoto = $data['coverPhoto'];

?>