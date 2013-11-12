@ECHO OFF

%~d0
CD "%~dp0"

echo "Executing some JavaScript on MonogBD..."
bin\mongo.exe WebNote 02_MongoDB_reset_data.js

pause