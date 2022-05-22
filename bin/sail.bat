@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/laravel/sail/bin/sail
bash "%BIN_TARGET%" %*
