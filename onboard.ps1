# Import ActiveDirectory module
Import-Module ActiveDirectory

param(
    [string]$firstName,
    [string]$lastName,
    [string]$gpoName,
    [string]$code
)

# Define variables
$password = ConvertTo-SecureString -String "Password123" -AsPlainText -Force

# Import CSV file and loop through each row
$i = 1
$username = $firstName.Substring(0, $i) + $lastName
$email = $username + "test.com"

# Check if user already exists in Active Directory
DO
{
    if (Get-ADUser -Filter {samaccountname -eq $username}) {
        Write-Host "WARNING: Login Name" $username "already exists!!" -ForegroundColor:Red
        $i++
        $username = $firstName.Substring(0, $i) + $lastName
        Write-Host "Changing Login Name to" $username -ForegroundColor:Green
        $taken = $True
    } else {
        $taken = $False
    }
} Until ($taken -eq $False)
    
# Create new user object
$userParams = @{
    GivenName = $firstName
    Surname = $lastName
    Name = "$firstName $lastName"
    Identity = $username
    DisplayName = "$lastName, $firstName"
    SamAccountName = $username
    UserPrincipalName = "$username@test.com"
    EmailAddress = $email
    AccountPassword = $password
    Enabled = $true
    ChangePasswordAtLogon = $True
    Description = $code
}
New-ADUser @userParams -PassThru | Set-ADAccountPassword -NewPassword $password -Reset

# Add user to appropriate security group via Group Policy Object
$gpo = Get-GPO -Name $gpoName
if ($gpo) {
    $groupName = "test\$($gpo.DisplayName) Users"
    Add-GPGroupMember -Name $gpo.DisplayName -Group $groupName -Member $username
    Write-Host ""
} else {
    Write-Warning "GPO $gpoName not found."
}