@echo off
:: Advertir al usuario que los archivos se copiarán a la carpeta storage
echo ADVERTENCIA: Los archivos de "storageBackup" serán copiados a "storage\app\public".
echo Esto puede sobrescribir los archivos existentes en "storage\app\public".
echo.
set /p confirm=¿Está seguro de que quiere proceder? (S/N): 

:: Si el usuario confirma (S), proceder con la restauración
if /I "%confirm%"=="S" (
    echo Copiando archivos desde "storageBackup" a "storage\app\public"...
    :: Copiar todo el contenido de la carpeta storageBackup a storage\app\public
    xcopy /E /H /Y "storageBackup" "storage\app\public\"
    
    :: Mostrar mensaje de éxito
    echo Restauración completada con éxito.
) else (
    echo Operación cancelada. Los archivos en "storage\app\public" no se han modificado.
)

pause
