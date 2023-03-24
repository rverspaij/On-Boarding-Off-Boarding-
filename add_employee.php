<?php
//Get the information and print it.
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$department = $_POST['department'];

$code = mt_rand(100000, 999999);

$command = 'powershell.exe -File "onboard.ps1" -firstName "'.$first_name.'" -lastname "'.$last_name.'" -department "'.$department.'" -code "'.$code.'"';
$output = shell_exec($command);
echo $output
?>