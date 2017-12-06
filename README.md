<h1 align="center">VADMIN</h1>

## Documentación

Vadmin es un gestor de contenido. Permite el manejo de distintas secciones de una web como ser un blog, un catálogo, un portfolio, etc. Dispone de un módulo de gestión de usuarios, donde los mismo pueden tener distintos tipos de permisos y pertenecer a grupos. Por ejemplo: Clientes, Usuarios, Administradores.

## Funciones y Métodos

### Actualizar estados:
Con esta función se pueden actualizar estados de distintos items (Ej. Artículos, productos, mensajes y demás) <br>
<b>Lenguaje:</b> Javascript (JQuery) <br>
<b>Función:</b> updateStatus(id, route, status, user, action);

Parámetros <br>
- id: Id primario del item. <br>
- route: Ruta (Ej. var route  = "{{ url('/vadmin/message_status') }}/"+id+""; ); <br>
- status: Status según base de datos <br>
- user: Nombre de algún usuario <br>
- action: 'reload' => Para recargar página, 'show' => Para mostrar algo sin recargar, 'none' => Sin acción. <br>

Mediante JSON devuelve: <br>
- response: TRUE o FALSE <br>
- message: En caso de error devuelve info (/Exception $e) <br>

