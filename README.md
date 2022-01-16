## Autodidacta

Autodidacta es una plataforma de aprendizaje en línea dirigida a estudiantes y profesores quienes quieran aprender por su propia cuenta y/o a su vez, compartir sus propios conocimientos a través de esta misma, generando así un recurso más cercano para poder encontrar una guía sobre algún tema que se dificulte o simplemente que sea de interés para la persona.

Objetivos:

- Promover el aprendizaje de forma autodidacta con una variedad de cursos disponibles.
- Incitar a la comunidad estudiantil, docente y general a compartir sus conocimientos a través de una plataforma web.
- Crear un espacio donde se resuelvan dudas y se hagan comentarios sobre lo aprendido en los cursos; los alumnos teniendo interacción con los instructores y viceversa.

## Instalación

1. Clonar proyecto
   `git clone https://github.com/kira187/Autodidacta.git`

2. Permisos requeridos en directorios
    1. Asignar permisos para directorio "storage" y subdirectorios:
     * `chmod 777 storage/ storage/app/ storage/framework/ storage/logs/`
     * `chmod 777 storage/framework/cache/ storage/framework/sessions/ storage/framework/views/`
     * `chmod 777 storage/logs/laravel.log`
    2. Asignar permisos para directorio "bootstrap/cache" y archivos
     * `chmod 777 bootstrap/cache/`
     * `chmod 777 bootstrap/cache/*`

3. Instalar dependencias: `composer install`

4. Compilar estilos
	1. Ejecutar `npx mix`

5. Base de datos
    1. Crear base de datos para el sistema

6. Configuración de entorno (.env)
    1. Crear archivo .env: `cp .env.example .env`
    2. Crear llave: `php artisan key:generate`
    3. Configurar conexión a base de datos

7. Migraciones y Seeders
    1. Ejecutar: `php artisan migrate`
    2. Ejecutar: `php artisan storage:link`
    3. Ejecutar: `php artisan db:seed`

## Licencia

[MIT license](http://opensource.org/licenses/MIT).
