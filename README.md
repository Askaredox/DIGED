#  Sistema de cursos en línea DEDEV

Sistema de ayuda al estudiante para estudiar cursos en línea por medio de una aplicación móvil, aplicación de escritorio hecho en [CodeIgniter][1] MVC para PHP. 

## Api

**/GET**

-  Obtener cursos actuales

  - Local: http://localhost/DEDEV/Api/cursos
  - Público: https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/cursos

- Obtener temas actuales por id de curso

  - `#` -> id del curso
  - Local: http://localhost/DEDEV/Api/temas/#
  - Público: https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/temas/#

- Obtener imagen actual del tema, id y coordenadas de los temas por id de tema

  - `#` -> id del tema
  - Local: http://localhost/DEDEV/Api/img/#
  - Público: https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/img/#

- Obtener el contenido del título por id del título

  - `#` -> id del título
  - Local: http://localhost/DEDEV/Api/titulo/#
  - Público: https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/titulo/#

  



## Cosas a corregir

### Administrador

| Lugar               | Correcciones                                             | Importancia      |
| ------------------- | -------------------------------------------------------- | ---------------- |
| Barra de navegación | Cerrado automático                                       | ``[#####     ]`` |
| Editar Usuario      | Colocar nombre                                           | ``[##        ]`` |
| Editar Usuario      | Para cambiar contraseña pedir la antigua                 | ``[######    ]`` |
| Base de Datos       | Para login solo debe mandar verdadero o falso            | ``[########  ]`` |
| Administrar Cursos  | Dar acción al botón no al link                           | ``[########  ]`` |
| Actualizar Curso    | Lugar aparte o pop-up, no usar códigos                   | ``[##        ]`` |
| Crear Docente       | Checkbox tenerlo de lado derecho como un icono de un ojo | ``[#         ]`` |
| Crear Docente       | Dar acción al botón no al link                           | ``[########  ]`` |
| Administrar Docente | Colocar contraseña tapada y colocar botón para destapar  | ``[#####     ]`` |
| Administrar Docente | Dar acción al botón no al link                           | ``[########  ]`` |
| TODO                | Cuando no hay usuario loggeado regresar al login         | ``[#####     ]`` |
| **Lugar**           | **Correcciones**                                         | ``[          ]`` |

### Docente

| Lugar                       | Correcciones                                               | Importancia      |
| --------------------------- | ---------------------------------------------------------- | ---------------- |
| Barra de navegación         | Cerrado automático                                         | ``[#####     ]`` |
| ~~Crear tema~~              | ~~Error fatal~~                                            | `[          ]`   |
| ~~Editar tema~~             | ~~No se muestra imagen~~                                   | `[          ]`   |
| ~~Editar tema~~             | ~~Colocar nombre viejo~~                                   | `[          ]`   |
| Editar tema                 | Colocar alerta que se agrego tema nuevo y sacar            | `[#######   ]`   |
| ~~Editar tema~~             | ~~No actualiza nada~~                                      | `[          ]`   |
| Eliminar tema               | Colocar tema que se va a eliminar                          | `[#####     ]`   |
| Administrar titulo/ver tema | Error cuando se entra                                      | `[######### ]`   |
| Crear titulo                | cuando se haya registrado sacar a administrar              | `[#####     ]`   |
| ~~Crear titulo~~            | ~~Redireccionar bien el atrás~~                            | `[          ]`   |
| administrar titulo          | Observar titulo no implementado                            | `[######### ]`   |
| Editar titulo               | Utilizar ventana aparte                                    | `[######### ]`   |
| Eliminar titulo             | Se queda trabajo, error fatal                              | `[########  ]`   |
| Barra navegación            | Con el editor de texto se cambia de posición los elementos | `[##        ]`   |
| **Lugar**                   | **Correcciones**                                           | `[          ]`   |



## Aplicación Móvil

La aplicación movil está en el siguiente repositorio.

[Aplicación móvil DEDEV][2]



## Estudiantes aportando

- 201602975 - Ruth Ardón
- 201612272 - Andrés Carvajal
- 201612304 - Mindi Ajpop















[1]:https://codeigniter.com/	"Página oficial de CodeIgniter"
[2]: https://github.com/RuthLechuga/App-movil-DIGED	"Repositorio de la aplicación móvil"