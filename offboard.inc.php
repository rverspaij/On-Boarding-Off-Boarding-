<?php
$username = $_POST['username'];

$ExpirationDate = date('m-d-Y', strtotime('+20 days'));

echo("$ExpirationDate");

echo "Attempting to suspend and delete account for $username..."; 

shell_exec("powershell Disable-ADAccount -Identity $username");
shell_exec("powershell Set-ADAccountExpiration -Identity $username -DateTime '$ExpirationDate'");
?>