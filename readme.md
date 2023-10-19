# Ecommerce Igniter 1.0

Proyecto de una tienda online creado para la materia Seminario de Lenguajes (PHP) 2023.

Fue desarrollado utilizando Codeigniter 3 y bootstrap 5.

### Desarrolladores

Bonino Ezequiel (Boniich)

### Caracteristicas

- El sitio cuenta con clientes y administradores. Ademas se incluye al usuario no logeado como "visitante".

- Tanto el cliente, visitante y administrador pueden ver el HOME y productos, asi como los detalles de estos, pero la diferencia esta en:

- Un visitante puede ver los productos y detalles de un producto pero no podra ver el boton de "agregar al carrito"
- Un cliente vera un boton de "Agregar al Carrito" que de momento no tiene ninguna funcionalidad
- Un administrador vera un mensaje que dice que los administradores no pueden comprar

- Un Cliente podra registrarse e ingresar al sistema
- Un cliente podra ver los detalles de los productos al hacer click en uno de ellos.

- Los administradores solo podran ingresar al sistema (si se encuentran registrados)
- Los administradores tienen un panel especial en el cual pueden ver,agregar,editar o eliminar Productos y Clientes

#### Estructra de Carpetas

---

```
- application
    |__controllers
    |    |__admin_panel
    |        |__login
    |    |__clients
    |        |__auth
    |__models
    |   |__admin_panel
    |   |    |__auth
    |   |    |__clients
    |   |    |__products
    |   |__clients
    |   |     |__auth
    |   |__home
    |
    |
    |
    |__views
        |__admin_panel
        |    |__clients
        |    |   |__client_details
        |    |   |__modals
        |    |
        |    |__products
        |        |__modals
        |        |__product_details
        |
        |
        |__auth
        |   |__admin_auth
        |   |__client_auth
        |
        |__clients
        |__feedback
        |__head
        |__home
        |__nav
           |__admin_nav
           |__client_nav
           |__modals
           |__unauthenticated_nav

Otras carpetas importantes

- documentation
- uploads

```

## Usuarios pre cargados para ingresar rapido al sistema

### Administrador

Email: admin@gmail.com  
Contraseña: 123456

### Clientes

Email: juan22@gmail.com  
Contraseña: 123456

Email: mirta@gmail.com  
Contraseña: 123456

Email: pietro2@gmail.com  
Contraseña: 123456

---
