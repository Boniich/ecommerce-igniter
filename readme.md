# Ecommerce Igniter 1.0

Proyecto de una tienda online creado para la materia Seminario de Lenguajes (PHP) 2023.

Fue desarrollado utilizando Codeigniter 3 y bootstrap 5.

## Demo del proyecto

Un pequeño video mostran y explicando el sitio web

https://youtu.be/PFp2sduYeCg

### Desarrolladores

Bonino Ezequiel (Boniich)

Web: www.boniich.com (Puede que cambiar a .ar en unos meses).  
Linkedin: https://www.linkedin.com/in/boniich/  
GitHub: https://github.com/Boniich

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

Email: pietro2@gmail.com  
Contraseña: 123456

---

## Como ejecutar el proyecto

### 1- Con el .rar de la entrega

1- Abrir .rar  
2- Correr xamp,wamp o cualquier otro entorno de desarrollo  
3- Crear una base de datos en `phpmyadmin` o algun editor de base de datos con el nombre de `ecommerce_igniter`
4- Ir a la carpeta `documentation/data_base` e importar ese archivo `ecommerce_igniter.sql` desde el mismo `phpmyadmin`

Listo. El proyecto deberia funcionar correctamente.

Recuerda, que si usas una PC de la UNLA, tienen problemas de puertos con wamp, por lo cual una vez solucionado eso debes habilitar la opcion de `port` en el archivo de config del proyecto

### 2- Con Git clone

Si eres alguien de internet que esta viendo este proyecto, y quieres usar `git clone`, debes seguir los mismo pasos que antes, pero debes hacer un paso extra.

Ve a la parte de `config` y luego al archivo `config` y busca `$config['base_url']` (es uno de los primeros del archivo)

Cambia `http://localhost/ecommerceIgniter/` por `http://localhost/ecommerce-igniter/`
