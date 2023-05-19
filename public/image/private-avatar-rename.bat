@echo off
setlocal enabledelayedexpansion

set "chemin_dossier=C:\Users\micka\Github Project\Symfony-Reseau-Social\public\image\private_avatar"
set "prefixe=image-"
set "numero=1"

for %%F in ("%chemin_dossier%\*.*") do (
    for /f "delims=" %%E in ("%%~xF") do (
        ren "%%F" "%prefixe%!numero!%%E"
    )
    set /a "numero+=1"
)
