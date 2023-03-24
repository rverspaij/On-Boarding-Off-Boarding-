Import-Module ActiveDirectory

param (
    [string]$email,
    [string]$userName,
    [string]$code,
    [string]$fullName
)

Get-ADUser -Identity $userName