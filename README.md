<p align="center">VADMIN</p>



## Documentación

Vadmin es un gestor de contenido. Permite el manejo de distintas secciones de una web como ser un blog, un catálogo, un portfolio, etc. Dispone de un módulo de gestión de usuarios, donde los mismo pueden tener distintos tipos de permisos y pertenecer a grupos. Por ejemplo: Clientes, Usuarios, Administradores.


## Funciones y Métodos

### Actualizar estados:
Con esta funcion podemos actualizar estados de artículos, productos, mensajes y demás.
<b>Lenguaje:</b> Javascript (JQuery) <br>
<b>Función:</b> updateStatus(id, route, status, user, action);

- id : Id primario del item.
- route : Ruta (Ej. var route  = "{{ url('/vadmin/message_status') }}/"+id+""; );
- status : Status según base de datos
- user : Nombre de algún usuario
- action : 'reload' => Para recargar página, 'show' => Para mostrar algo sin recargar, 'none' => Sin acción.



