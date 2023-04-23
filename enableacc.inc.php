<?php
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$code = $_POST['code'];

echo "Attempting to enable account for $fullname with email address $email...";

$command = 'dsquery user -samid ' . $username . ' | dsget user -desc';
$output = shell_exec($command);

if (!empty($output)) {
  // extract the description from the output using regular expressions
  preg_match('/^desc\s+(.+)\s+dsget succeeded$/i', trim($output), $matches);
  $description = isset($matches[1]) ? $matches[1] : '';
  
} else {
  echo "Unable to retrieve user information.";
}

if ($description == $code) {
  shell_exec("powershell.exe Enable-ADAccount -Identity $username; Unlock-ADAccount -Identity");
  echo "<p>The account for " .$fullname . " has succesfully been unlocked!</p>";
} else {
  echo "<p>The action for unlocking " .$fullname . " has failed!</p>";
}
?>