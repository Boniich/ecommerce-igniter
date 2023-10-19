###################
Ecommerce Igniter 1.0
###################

Proyecto de una tienda online creado para la materia Seminario de Lenguajes (PHP) 2023.

Fue desarrollado utilizando Codeigniter 3 y bootstrap 5. 


*******************
Desarrolladores
*******************

Bonino Ezequiel (Boniich)

**************************
Caracteristicas
**************************

- El sitio cuenta con clientes y administradores. Ademas se incluye al usuario no logeado como "visitante"

- Tanto el cliente, visitante y administrador pueden ver el HOME y productos, asi como los detalles de estos, pero la diferencia esta en:

- Un visitante puede ver los productos y detalles de un producto pero no podra ver el boton de "agregar al carrito"
- Un cliente vera un boton de "Agregar al Carrito" que de momento no tiene ninguna funcionalidad
- Un administrador vera un mensaje que dice que los administradores no pueden comprar

- Un Cliente podra registrarse e ingresar al sistema
- Un cliente podra ver los detalles de los productos al hacer click en uno de ellos.


- Los administradores solo podran ingresar al sistema (si se encuentran registrados)
- Los administradores tienen un panel especial en el cual pueden ver,agregar,editar o eliminar Productos y Clientes


*******************
Estructra de Carpetas
*******************
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

```


************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
