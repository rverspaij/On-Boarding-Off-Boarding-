<?php
session_start();
$username = $_POST['username']; // replace with the username of the AD user you want to retrieve information for
$code = $_POST['password'];

$command = 'dsquery user -samid ' . $username . ' | dsget user -dept';
$output = shell_exec($command);

if (!empty($output)) {
  // extract the description from the output using regular expressions
  preg_match('/^dept\s+(.+)\s+dsget succeeded$/i', trim($output), $matches);
  $department = isset($matches[1]) ? $matches[1] : '';
  
  // print the description
  echo "Department: $department<br>";
} else {
  echo "Unable to retrieve user information.";
}

$commands = 'dsquery user -samid ' . $username . ' | dsget user -desc';
$outputs = shell_exec($commands);

if (!empty($outputs)) {
  // extract the description from the output using regular expressions
  preg_match('/^desc\s+(.+)\s+dsget succeeded$/i', trim($outputs), $matches);
  $description = isset($matches[1]) ? $matches[1] : '';
  
} else {
  echo "Unable to retrieve user information.";
}

if (trim($department) == "IT" && $code == $description) {
  $_SESSION['username'] = $username;
  header('Location: http://10.10.1.100/onboard.php');
  exit();
} else {
  echo "You are not authorized for this!";
}
?>