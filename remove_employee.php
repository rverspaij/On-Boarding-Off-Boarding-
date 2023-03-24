<?php
# Get user to remove
$username = $_POST['username'];

$expDate = date('m-d-Y', strtotime('+20 days'));
echo $expDate;

echo "Attempting to suspend account for $username...";

$command = 'powershell.exe -File "offboard.ps1" -userName "'.$username.'" -expDate "'.$expDate.'"';
$output = shell_exec($command);
echo $output;
?>