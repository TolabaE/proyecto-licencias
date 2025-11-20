# Proyecto realizado para el ejercito AMBs

### una vez clonado el repositorio abrimos la terminal, vamos a seguir unos pasos necesarios para poder levantar el proyecto.

* Vamos por parte dijo Jack el destripador, Laravel utiliza npm (Node Package Manager) para gestionar las librerías de frontend (como Bootstrap y sus dependencias de JavaScript, como Popper).

` npm install `

* El siguiente comando para descargar el código de Laravel, Livewire (si lo usa), y cualquier otra librería de PHP a la carpeta vendor/

` composer install `

* Ahora vamos a clonar el archivo .env para Generar la Clave de Aplicación.

` cp .env.example .env `

* Aunque no necesitemos variables de entorno, la clave de aplicación sigue siendo necesaria para la seguridad.

`php artisan key:generate `

* Este paso lo hacemos manualmente, vas a buscar la carpeta llamada "database", click derecho "new file" y ahi crea un archivo llamado "database.sqlite", ya que 
laravel necesita una base local para levantar el servidor, aunque no hagamos uso de ella, Ahora que el archivo existe.


* siguiendo los pasos vamos a ejecutar las migraciones para conectar con la base local.

` php artisan migrate `


* Ahora dale al famoso comando necesario para que todo compile, principalmente bootstrap ya que hacemos uso de dicho framework.

`npm run dev`

* Finalmente abriendo otra terminal vamos a levantar el servidor laravel usando 

`php artisan serve`

* y listo el proyecto deberia estar funcionando en tu ordenador ¡¡asegurate de haber levantado el servidor back-end!!


-- --
## herramientas utilizas 
* laravel -v 12
* bootstrap -v 5
* sweetalert2
* Jquery validation
* Node -v 24.11.0
* Composer 
