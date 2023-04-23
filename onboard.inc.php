<?php
session_start();

// Haal de gegevens op uit het onboarding-formulier
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = strtolower(substr($firstname, 0, 1) . $lastname);
$email = strtolower(substr($firstname, 0, 1) . $lastname) . "@Fonteyn.nl";
$manager = "Patrick";
$department = $_POST['department'];

$resetCode = mt_rand(10000, 99999);

$password = "Welkom123";

shell_exec("powershell New-ADUser '$firstname $lastname' -GivenName $firstname -SurName $lastname -SamAccountName $username -Department $department -EmailAddress $email -Description $resetCode -AccountPassword (ConvertTo-SecureString -String $password -AsPlainText -Force)");
shell_exec("powershell Set-ADUser -Identity $username -ChangePasswordAtLogon \$true");
shell_exec("powershell Enable-ADAccount $username");

// Toon een bevestiging op het scherm
echo "<p>User has been succesfully added!</p>";
echo "<p>Your password is 'Welkom123' and you will be able to change it on first logon.</p>";
echo "<p>The username is " .$username . "</p>";
echo "<p>The email address is " . $email . "</p>";
echo "<p>Your code is " . $resetCode . ", this code is important since you can use it when you forgot your password to change it.</p>"
?>