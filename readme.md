# Ecommerce Igniter 1.1

Proyecto de una tienda online creado para la materia Seminario de Lenguajes (PHP) 2023.

Fue desarrollado utilizando Codeigniter 3 y bootstrap 5.

Despues de entregar el proyecto y aprobar la materia continue agregandole algunas cosas mas, que no estaban en el enunciado dado por la materia pero que hacian mas completo el proyecto, algunas de estas cosas son: el carrito de compras, paginacion, ajustes, etc.

## Demo del proyecto

Un pequeño video mostran y explicando el sitio web

https://youtu.be/JjYjpaKnfM0

### Desarrolladores

Bonino Ezequiel (Boniich)

Web: www.boniich.com (Puede que cambiar a .ar en unos meses).  
Linkedin: https://www.linkedin.com/in/boniich/  
GitHub: https://github.com/Boniich

### Caracteristicas

- El sitio cuenta con clientes y administradores. Ademas se incluye al usuario no logeado como "visitante".

- Tanto el cliente, visitante y administrador pueden ver el HOME y productos, asi como los detalles de estos, pero la diferencia esta en:

- Un visitante puede ver los productos y detalles de un producto pero no podra ver el boton de "agregar al carrito"

- Un cliente vera un boton de "Agregar al Carrito", la cantidad disponible del producto y una opcion para seleccionar cuanta cantidad desea comprar.

- Un cliente podra agregar un producto al carrito de compras haciendo click en el boton de "agregar al carrito".

- Un cliente podra ver, editar y eliminar todos los productos de su carrito de compras

- Un cliente podra ver el total de todos los productos juntos de su carrito

- Un administrador vera un mensaje que dice que los administradores no pueden comprar

- Un Cliente podra registrarse e ingresar al sistema
- Un cliente podra ver los detalles de los productos al hacer click en uno de ellos.

- Un cliente podra cambiar su foto de perfil, nombre y apellido, dni, contraseña y email

- Un administrador podra cambiar su foto de perfil, nombre y apellido, contraseña y email

- Los administradores solo podran ingresar al sistema (si se encuentran registrados)
- Los administradores tienen un panel especial en el cual pueden ver,agregar,editar o eliminar Productos y Clientes

- Se ha agregado la paginacion para cada parte del sitio web que sea necesaria

#### Estructra de Carpetas

---

```
- application
    |__controllers
    |    |__admin_panel
    |        |__login
    |        |__settings
    |    |__clients
    |        |__auth
    |        |__settings
    |        |__shopping_car
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
        |    |    |__modals
        |    |    |__product_details
        |    |
        |    |__settings
        |
        |__auth
        |   |__admin_auth
        |   |__client_auth
        |
        |__clients
        |  |__settings
        |  |__shopping_car
        |
        |__feedback
        |__head
        |__home
        |__nav
           |__admin_nav
           |__client_nav
           |__modals
           |__unauthenticated_nav

Otras carpetas importantes

- documentation (Encontraran un Diagrama UML, diagrama de base de datos, y script de la base de datos del proyecto)
- uploads (Imagenes subidas al proyecto, que se conectan con la base de datos)

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

Email: ezequielperez@gmail.com
Contraseña: 123456

---

## Como ejecutar el proyecto

### 1- Clone el proyecto

1- Necesitas xamp o wamp con PHP 8.0.28 como maximo, si usas uno mas nuevo, puede haber incopatibilidades.

Te recomiendo el siguiente (xamp para windows): https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.0.28/

Si utilizas linux o mac, puede encontrar el respectivo xamp aqui: https://sourceforge.net/projects/xampp/files/

2- Prende tu entorno de desarrollo (xamp,wamp, etc). En el caso de XAMP, solo necesitas activar APACHE y MYSQL

3- Clona el proyecto usando `GIT` dentro de la carpeta correspondiente de entorno de desarrollo (en el caso de XAMP es `htdocs`)

4- Una vez clonaste el repo, cambia el nombre por defecto que da el repositorio `ecommerce-igniter` a `ecommerceIgniter`. Si no haces este paso tendras problemas para acceder a las diferentes URL del sitio

5- Abre tu `phpmyadmin` o tu programa/web de base de datos y crea una base de datos llamada `ecommerce_igniter`

6- Importa el archivo `ecommerce_igniter.sql` que se encuentra dentro de la carpeta `documentation/data_base`

7- Abre tu navegador e ingresa a la siguiente url `http://localhost/ecommerceIgniter/`

8- Pruba las funcionalidades de la web
