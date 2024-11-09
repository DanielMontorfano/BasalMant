@echo off
:: Crear la carpeta storageBackup si no existe
if not exist "storageBackup" (
    mkdir "storageBackup"
)

:: Copiar todo el contenido de la carpeta storage\app\public a storageBackup
xcopy /E /H /Y "storage\app\public" "storageBackup\"

:: Mostrar un mensaje de éxito
echo Backup de storage\app\public a storageBackup completado.
pause
