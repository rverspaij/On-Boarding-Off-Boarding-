<?php
$username = $_POST'username'];
$code = $_POST'code'];
$password = $_POST'password'];
$password1 = $_POST'password1'];

echo "Attempting to change password for user $username";

$command = 'dsquery user -samid ' . $username . ' | dsget user -desc';
$output = shell_exec($command);

if (!empty($output)) 
    preg_match('/^desc\s+(.+)\s+dsget succeeded$/i', trim($output), $matches);
    $description = isset($matches1]) ? $matches1] : '';
} else 
    echo "Unable to retrieve user information."
}

if ($description == $code && $password == $password1) 
    shell_exec("powershell Enable-ADAccount -Identity $username");
    shell_exec("powershell Set-ADAccountPassword -Identity $username -NewPassword (ConvertTo-SecureString -String $password -AsPlainText -Force)");
    echo "<p>Your password has been successfully changed!</p>";
} else 
    echo "<p>Your request for changing your password has failed please try again or get in contact with our support team.</p>";
}
?>