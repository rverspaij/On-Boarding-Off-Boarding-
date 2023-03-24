# Import ActiveDirectory module
Import-Module ActiveDirectory

param (
    [string]$userName,
    [int]$expDate
)

Disable-ADAccount -Identity $userName
Set-ADAccountExpiration -Identity $userName -DateTime $expDate