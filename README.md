# Proyecto realizado para el ejercito AMBs

### una vez clonado el repositorio vamos a abrir la terminal y ejecutamos las siguientes comandos.

* Ejecuta Composer para descargar el código de Laravel, Livewire (si lo usa), y cualquier otra librería de PHP a la carpeta vendor/:

` composer install `

* vamos a clonar el archivo .env para Generar la Clave de Aplicación.

` cp .env.example .env `

Aunque no uses variables de entorno, la clave de aplicación sigue siendo necesaria para la seguridad.

`php artisan key:generate `

* luego navega hasta la carpeta: database/ y ahi crea un archivo llamado "database.sqlite", Ahora que el archivo existe, Laravel puede conectarse y usarlo.

* vamos a ejecutar las migraciones.

` php artisan migrate `



* Laravel utiliza npm (Node Package Manager) para gestionar las librerías de frontend (como Bootstrap y sus dependencias de JavaScript, como Popper).

` npm install `

* ahora dale al famoso comando necesario para que todo compile.

`npm run dev`

¡¡¡ recorda siempre compilar bootstrap y despues laravel ¡¡¡

* y finalmente levantamos el servidor laravel usando

`php artisan serve`


-- --
## herramientas utilizas 
* laravel -v 12
* bootstrap v5
* sweetalert2
