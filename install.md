# laravel-base

### Instalación

**IMPORTANTE**

Estos pasos deben ser realizados por alguien que tenga conocimiento de cómo configurar servidores, bases de datos y gestión de archivos, de lo contrario el proyecto puede quedar configurado incorrectamente y funcionar mal. Poner mucha atención a lo siguiente. La estructura y los nombres de carpetas y archivos serán diferentes de acuerdo al proveedor de hosting.

**Esto es solo una guía general y posiblemente se requieran ajustes extras.**

**Antes de llevar a cabo estas instrucciones primero deben leerse con atención.**

#### Instrucciones

Suponiendo que el .zip de laravel-base se haya descomprimido en `/home/miusuario/` debería existir una estructura como ésta:

```html
.
|── ...
|── home
|   └── miusuario
|       └── laravel-base
|           ├── app
|           ├   |── Console
|           │   ├── Events
|           |   |── ...
|           │   ├── Http
|           |   |── Jobs
|           │   └── ...
|           |── bootstrap
|           |   └── ...
|           |── config
|           |   └── ...
|           |── database
|           |   └── sshmanager_home_app.sql
|           |── public
|           |   |── css
|           |   |── font
|           |   |── images
|           |   └── ...
|           └── ...
|──  ...
|── var
|    └── www
|       └── html
|           └── index.html
└── ...
```

- Ubicarse en la carpeta raíz del proyecto: 
  
  ```shell
  cd /home/miusuario/laravel-base
  ```

- Después instalar las dependencias con `composer install`.

- Crear una base de datos en mysql (llamada `laravel_base_app` de preferencia, aunque el nombre es de libre elección):
  
  ```sql
  CREATE DATABASE IF NOT EXISTS `nombre_base_de_datos` CHARACTER SET  `utf8mb4` DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ```

- En caso de que el proveedor no permitiera la creación de nuevas bases de datos queda intentar modificar la existente con los parámetros de arriba (`CHARACTER SET utf8mb4 DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci`).

- Y si fallara igual entonces tocará configurar con la base de datos por defecto que traiga el proveedor tal cual.

- Importar la estructura de la base datos:
  
  ```shell
  mysql -h(ip_host_hosting) -u(usuario_mysql) -p(contraseña_mysql) (nombre_base_de_datos) < /databases/laravel_base_app.sql
  ```
  
  *Claro que sin los paréntesis y con los parámetros del usuario creado o los que haya dado el proveedor.*

- Crear un nuevo usuario en mysql (con el mismo nombre que la base de datos) o modificar el existente asignándole permisos:
  
  ```sql
  GRANT Grant option ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Insert ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT References ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Select ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Show view ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Trigger ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Update ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  GRANT Delete ON usuario_base_de_datos.* TO 'nombre_base_de_datos'@'ip_host_hosting';
  FLUSH PRIVILEGES;
  ```

- Borrar la carpeta html:
  
  ```shell
  rm -rf /var/www/html
  ```

- Crear un enlace directo:
  
  ```shell
  ln -s /home/miusuario/laravel-base/public /var/www/html
  ```

- Ubicarse otra vez en la carpeta raíz del proyecto. Asignar permisos a los siguientes directorios:
  
  ```shell
  chmod -R 777 /home/miusuario/laravel-base/bootstrap/cache
  chmod -R 777 /home/miusuario/laravel-base/storage
  ```

- Reiniciar servicios http y de la base de datos para aplicar los cambios.

#### Configurar por primera vez el proyecto

- Checar que haya un archivo llamado `.env` en la ruta `/home/miusuario/laravel-base`. En caso que no esté hay que crear uno:
  
  ```shell
  cd /home/miusuario/laravel-base
  cp .env.example .env
  ```

- Abrir el archivo `.env`.
  
  ```ini
  APP_ENV=local
  APP_KEY={HASH_GENERACIÓN_CONTRASEÑAS}
  
  APP_DEBUG=true
  
  APP_LOG_LEVEL=debug
  APP_URL=http://127.0.0.1
  
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel_base_app
  DB_USERNAME=root
  DB_PASSWORD=
  
  CACHE_DRIVER=file
  SESSION_DRIVER=file
  QUEUE_DRIVER=sync
  
  REDIS_HOST=127.0.0.1
  REDIS_PASSWORD=null
  REDIS_PORT=6379
  
  MAIL_DRIVER=mail
  MAIL_HOST=127.0.0.1
  MAIL_PORT=587
  MAIL_USERNAME=admin@email.app
  MAIL_PASSWORD=admin@email.app
  MAIL_ENCRYPTION=true
  
  ALLOW_USER_REGISTRATION=true
  ```

He aquí algunas observaciones:

- Escribir los parámetros de acuerdo a como el archivo de configuración los vaya pidiendo.

- En caso de ser una primera instalación se debe crear un nuevo hash. Para generarlo hay que ejecutar el script de mantenimiento:
  
  ```
  php artisan key generate
  ```
  
  El hash se va guardar automáticamente en el archivo de configuración. Si no es así hay que copiarlo y pegarlo directamente en  `APP_KEY` o en su defecto, utilizar el que se ha utilizado previamente.

- Para activar los mensajes de depuración en pantalla `APP_DEBUG` debe ser `true` en desarrollo. En producción debe ser `false`.

- `APP_LEVEL_DEBUG` indica el nivel de eventos a registrar en el archivo log. Por defecto está en `debug`.

- `APP_URL` lleva el dominio/ip del sitio. Si el sitio ya está 
configurado como ssl entonces se agregará https:// al inicio del 
dominio, pero si no tiene habilitado ssl o si es una simple ip entonces se agregará http:// al inicio de la dirección. Por ejemplo, con ssl activado, si el dominio es abc.net entonces se guardará como http://abc.net, si no está activo el ssl entonces el dominio xyz.com se guardará como https://xyz.com, si se maneja ip y la dirección es 123.123.123.123 entonces se guardará como http://123.123.123.123).

- `DB_HOST` lleva el host/ip del proveedor de hosting.

- `DB_PORT` lleva el puerto especificado del proveedor de hosting.

- `DB_DATABASE` lleva el nombre de la base de datos.

- `DB_USERNAME` debe llevar el nombre de usuario la base de datos.

- Para `DB_PASSWORD` se coloca ahí la contraseña del nombre de usuario de la base de datos.

- En `MAIL_DRIVER` el valor se queda así para enviar correos de la forma clásica. Para depuración sin necesidad de usar conexión a internet el valor puede ser `log`.

- `MAIL_HOST` lleva el dominio del proveedor del correo.

- `MAIL_PORT` lleva el puerto especificado también por el proveedor de correo.

- `MAIL_USERNAME` ocupa el nombre de usuario y en `MAIL_PASSWORD` la contraseña de usuario. Ambos otorgados por el proveedor de correo.

- En `MAIL_ENCRYPTION` si el proveedor de correo especifica un tipo de encriptado el valor es `true`. Si no es así entonces es `false`.

- `ALLOW_USER_REGISTRATION` si es `true` va permitir nuevos registros de cuentas. En `false` no lo hará.

- Antes de ponerlo oficialmente al público, abrir el sitio de la organización en un navegador y comprobar que la instalación y configuración sean correctas.

#### Mantenimiento

Revisar las opciones disponibles ejecutando en consola:

```
php artisan
```

#### Soporte

Cualquier pregunta o comentario ponerse en contacto con el desarrollador.
