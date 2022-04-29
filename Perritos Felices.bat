@echo off

cd C:/laragon

tasklist /nh /fi "imagename eq laragon.exe" | find /i "laragon.exe" > nul || (start laragon.exe)

sleep 20

start http://proyectoids.test/home