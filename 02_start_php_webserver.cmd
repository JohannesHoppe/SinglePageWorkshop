@ECHO OFF

%~d0
CD "%~dp0"

echo Uses PHP 5.5 built-in web server to serve a Zend Framework application.
echo PHP.exe needs to be in your PATH

start http://localhost:1337

SET APPLICATION_ENV=development

cd public
php -S localhost:1337

pause