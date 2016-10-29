<?php
// plubic page keep things simple
require '../inc/functions.php';
require '../app/config.php';
require '../app/classes/LegacyDatabase.php'; // require sessions class

// set and clean var
$name = cleanvar($_POST['username']);

// if name is empty return nothing
if(empty($name)) {
	echo '';
	exit;
}

$dbl = LegacyDatabase::getInstance(); // create DBL (echelon DB link)

$result = $dbl->checkUsername($name); // check to see if the name is already in use // return bool
if($result)
	echo 'yes';
else
	echo 'no';

exit;