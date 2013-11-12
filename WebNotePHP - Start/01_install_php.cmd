@ECHO OFF

%~d0
CD "%~dp0"

@echo Downloading Chocolatey
@powershell -NoProfile -ExecutionPolicy unrestricted -Command "iex ((new-object net.webclient).DownloadString('http://bit.ly/psChocInstall'))"
SET PATH=%PATH%;%systemdrive%\chocolatey\bin

@echo Downloading PHP 5.5.5
CALL cinst php55

pause