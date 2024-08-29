# Proyecto Blog PHP/MVC/POO

## Descripción
El proyecto tendrá como finalidad poner en práctica los conocimientos adquiridos hasta la fecha de creación de este, es decir, utilizando programación orientada a objetos y utilizando el patrón Modelo Vista Controlador.

## Funcionalidades

### Gestión de Usuarios 
- **Registro de Usuario**: Permitir a los nuevos usuarios crear una cuenta.✅
- **Sesiones de Usuario (Login/Logout)**: Permitir a los usuarios iniciar y cerrar sesión.✅
- **Perfil de Usuario**: Visualización y edición del perfil del usuario.✅
- **Seguimiento de Perfiles**: El usuario podrá seguir a otro perfil y visualizar en una vista solo los posts de usuarios seguidos.

### Gestión de Posts
- **Publicar un Post**: Los usuarios podrán crear y publicar un post.✅
- **Contenido del Post**: El post podrá contener texto y una imagen.✅
- **Comentarios en el Post**: Los usuarios podrán comentar en los posts.✅
- **Likes y Dislikes en el Post**: Los usuarios podrán dar likes y dislikes a los posts.✅
- **Estado del Post**: Los posts podrán tener un estado de Oculto o Visible.✅
- **Categorías del Post**: Los posts podrán clasificarse en categorías como deporte, política, videojuegos, etc.✅

### Funcionalidades Adicionales
- **Búsqueda (Search)**: El sitio deberá tener una funcionalidad de búsqueda para encontrar posts.✅
- **Página de Inicio Personalizada**: Mostrar posts de usuarios seguidos en la página de inicio del usuario logueado.✅
- **Paginación**: Implementar paginación para manejar grandes volúmenes de posts y comentarios.
- **Validación y Sanitización**: Asegurar que todos los inputs del usuario estén validados y sanitizados para evitar ataques XSS y SQL Injection.
- **Roles de Usuario**: Implementar roles (administrador, usuario) con diferentes permisos y acceso a ciertas funcionalidades.✅
- **Mensajería Privada**: Permitir a los usuarios enviar mensajes privados entre sí.
- **Notificaciones**: Notificar a los usuarios sobre nuevos seguidores, likes, comentarios, etc.
- **Sistema de Tags**: Permitir a los usuarios agregar tags a sus posts para mejorar la búsqueda y organización de contenido.
- **Archivo de Posts**: Implementar una funcionalidad de archivo para acceder a posts antiguos por mes/año.

## Estructura del Proyecto

### Modelo (Model)
- **User**: Gestión de usuarios (registro, login, perfil, seguidores).✅
- **Post**: Gestión de posts (crear, editar, eliminar, likes, dislikes, estado, categoría).✅
- **Comment**: Gestión de comentarios en los posts.✅
- **Category**: Gestión de categorías de posts.✅
- **Follow**: Gestión de seguimientos entre usuarios.

### Vista (View)
- **Templates**: Plantillas HTML para mostrar los datos (login, registro, perfil, lista de posts, detalles del post, etc.).✅
- **Partials**: Componentes reutilizables (header, footer, sidebar, etc.).✅

### Controlador (Controller)
- **UserController**: Controlador para manejar acciones relacionadas con usuarios (login, registro, perfil).✅
- **PostController**: Controlador para manejar acciones relacionadas con posts (crear, editar, eliminar, mostrar).✅
- **CommentController**: Controlador para manejar acciones relacionadas con comentarios.✅
- **CategoryController**: Controlador para manejar acciones relacionadas con categorías.✅
- **FollowController**: Controlador para manejar acciones relacionadas con seguidores.

## Tecnologías y Herramientas
- **PHP**: Lenguaje de programación principal.✅
- **MySQL**: Base de datos para almacenar información del blog.✅
- **HTML/CSS**: Para la estructura y diseño de las vistas.✅
- **JavaScript**: Para mejorar la interactividad en el front-end.
- **Composer**: Para gestionar dependencias en PHP.
- **Git**: Para el control de versiones del proyecto.✅

## Sugerencias para el Desarrollo
1. **Planificación**: Divide el proyecto en pequeñas tareas y establece un cronograma de trabajo.
2. **Repositorio Git**: Utiliza un repositorio Git para mantener un historial de cambios y facilitar el trabajo colaborativo.✅
3. **Entorno de Desarrollo Local**: Configura un entorno de desarrollo local con herramientas como XAMPP o MAMP.✅
4. **Pruebas Unitarias**: Implementa pruebas unitarias para asegurar el correcto funcionamiento de las funcionalidades.
5. **Documentación**: Documenta el código y las funcionalidades del proyecto para facilitar el mantenimiento y la colaboración.

¡Buena suerte con tu proyecto!
