@ECHO OFF

%~d0
CD "%~dp0"

echo Uses PHP 5.5 built-in web server to serve a Zend Framework application.
echo PHP.exe needs to be in your PATH

start http://localhost:1339

SET APPLICATION_ENV=development
SET PHPRC=%~dp0vendor\php-win\

cd public
php -S localhost:1339 -d extension_dir=%PHPRC%

pause