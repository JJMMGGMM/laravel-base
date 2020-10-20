# laravel-base

### Versión 1.0

Estructura para inicializar cualquier tipo de proyecto básico-mediano, hecha con laravel 5.2 y bootstrap 4. Sin ajax y con jquery solamente para mejorar un poco la presentación visual.

#### Requerimientos

Contar con un servicio de hosting especializado en php que al menos ofrezca lo siguiente para facilitar la instalación, ya que la falta de requerimientos puede originar errores:

- Servidor http (apache, nginx, etc...).
- Debe tener php activado, con la versión 5.5.9 como mínima y 7.2.x como la máxima.
- Contar con las siguientes extensiones habilitadas en php: `gd, fileinfo, json, mbstring, pdo, pdo_mysql, tokenizer y openssl`.
- Git.
- Composer.
- MySQL/MariaDB.
- Acceso ssh/sftp/rsync con suficientes permisos.
- Tener correo electrónico para la organización y contar con al menos 1GB de espacio de almacenamiento en hosting.

#### Instalación

- Leer el archivo `install.md` para más detalles.

#### Rutas de acceso

- Ingresar: `https://{url}/ingresar`
- Registro: `https://{url}/registro`
- Reestablecer usuario: `https://{url}/perfil/reestablecer-usuario`

#### Personalización

Las partes que se pueden personalizar con información aparte de las típicas son las siguientes:

- **Controladores:** 
  Archivo `/app/Http/Controllers/PerfilController.php` para reemplazar los correos falsos que están en el código por correos reales.

- **Vistas:**
  Ruta `/resources/views/correos` para modificar los datos de las plantillas con información real.

- **Base de datos:**
  Archivo `/databases/laravel_base_app.sql` se debe eliminar y crear otro nuevo con el nombre del proyecto.

- **Sesiones:**
  `/config/session.php` para cambiarle el nombre de la sesión principal.

- **Otros:**
  `/config/app.php` para editar la zona horaria y la generación de logs.

Obviamente se puede cambiar la apariencia, reestructurar carpetas y código del proyecto y se puede usar ajax en vez de las funciones clásicas para procesar y obtener información en la aplicación, así como usar bibliotecas javascript externas, etc, etc...

#### Extras

Algunos paquetes extras que pueden ser útiles al momento de crear una aplicación son:

- `box/spout` para manejar hojas de cálculo.
- `barryvdh/laravel-dompdf` para manejar pdfs.
- `milon/barcode` para crear códigos de barra.
- `parsedown/laravel` para usar y renderizar contenido en markdown.
- `faustbrian/laravel-environment` para ofuscar entornos `.env`.

*Solo son opciones.*

#### Importante

- Por defecto la ruta de registro ha sido bloqueada, por lo que para volver activarla hay que buscar y abrir el archivo `.env` y cambiar el valor de `ALLOW_USER_REGISTRATION=false` a `ALLOW_USER_REGISTRATION=true`.

#### Soporte

Se aceptan preguntas, sugerencias que no sean lapidarias y pull requests.

#### Agradecimientos

Gracias a [Bootswatch](https://bootswatch.com/) por la plantilla. A [laravel](https://laravel.com) también por facilitar el desarrollo de sitios y aplicaciones en php.

#### LImitación de responsabilidad

Este producto se ofrece tal cual, esperando ser útil, pero el autor no se hace responsable de daños ni reparaciones en caso de cualquier falla que pueda ser atribuible al uso de este software.

#### Licencia

Proyecto publicado bajo la [licencia MIT](https://opensource.org/licenses/MIT).
