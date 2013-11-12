@echo off

%~d0
CD "%~dp0"

@echo Downloading Ruby
CALL cinst ruby

@echo Downloading Sass
CALL gem install sass

pause