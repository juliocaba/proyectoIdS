@echo off

cd C:/laragon

tasklist /nh /fi "imagename eq laragon.exe" | find /i "laragon.exe" > nul || (start laragon.exe)

timeout /t 1 /nobreak > NUL

start http://proyectoids.test/home