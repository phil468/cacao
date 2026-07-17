$ErrorActionPreference = 'Stop'
. (Join-Path $PSScriptRoot 'activate-local-tools.ps1')
Set-Location (Join-Path $PSScriptRoot '..\backend')
php artisan serve --host=127.0.0.1 --port=8000
