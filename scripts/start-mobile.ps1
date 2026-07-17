$ErrorActionPreference = 'Stop'
. (Join-Path $PSScriptRoot 'activate-local-tools.ps1')
Set-Location (Join-Path $PSScriptRoot '..\mobile')
npm start -- --host=127.0.0.1 --port=8100
