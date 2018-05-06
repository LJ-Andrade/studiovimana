<h1 align="center">VADMIN</h1>

## Documentación

Vadmin es un gestor de contenido. Permite el manejo de distintas secciones de una web como ser un blog, un catálogo, un portfolio, etc. Dispone de un módulo de gestión de usuarios, donde los mismo pueden tener distintos tipos de permisos y pertenecer a grupos. Por ejemplo: Clientes, Usuarios, Administradores.

# Usuarios / Vadmin
## Tipos de Usuario (role)
- 1 Superadmin 
- 2 Admin 
- 3 User 
- 4 Guest

## Grupos (group)
- 1 Member
- 2 Client
- 3 ClientBig

# Usuarios / Tienda
## Grupos (group)
- 1 Client
- 2 ClientBig
- 3 Other

# Carro de compras
## Estado de las órdenes
- 'Active' => Iniciado
- 'Process' => Pendiente
- 'Approved' => Aprobada
- 'Canceled' => Cancelada
- 'Finished' => Finalizada
- 
## Funciones y Métodos

<!-- ### Actualizar estados:
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
- message: En caso de error devuelve info (/Exception $e) <br> -->

## CRUDS
Comando para generar CRUDS desde consola

<blockquote>php artisan crud:generate Posts --fields='title#string; content#text; category#select#options={"technology": "Technology", "tips": "Tips", "health": "Health"}' --view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html</blockquote>

<blockquote>php artisan crud:generate Shippings --fields='name#string' --view-path=Vadmin/Catalog --controller-namespace=Catalog --route-group=Vadmin</blockquote>


## Activar y Pausar items

Insertar:
><label class="switch">
    <input class="UpdateStatus switch-checkbox" type="checkbox" 
    data-model="NOMBRE-DEL-MODELO" data-id="{{ $item->id }}"
    @if($item->status == '1') checked @endif>
    <span class="slider round"></span>
</label>


## Calcular precios del carro de compras

<blockquote>Método: calcCartTotalPrice($cart);</blockquote>

Devuelve un array con dos valores 
$data['subtotal']
$data['total']