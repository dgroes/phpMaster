<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto Large 2.0

## Descripción
El proyecto tendrá como finalidad recrear el proyecto realizado previamente con PHP Nativo "Large", pero ahora con Laravel, además de aplicar nuevos conocimientos adquiridos hasta la fecha.

## Funcionalidades

### Gestión de Usuarios 
- **Registro de Usuario**: Permitir a los nuevos usuarios crear una cuenta.
- **Sesiones de Usuario (Login/Logout)**: Permitir a los usuarios iniciar y cerrar sesión.
- **Perfil de Usuario**: Visualización y edición del perfil del usuario.
- **Seguimiento de Perfiles**: El usuario podrá seguir a otro perfil y visualizar en una vista solo los posts de usuarios seguidos.

### Gestión de Posts
- **Publicar un Post**: Los usuarios podrán crear y publicar un post.
- **Contenido del Post**: El post podrá contener texto y una imagen.
- **Comentarios en el Post**: Los usuarios podrán comentar en los posts.
- **Likes y Dislikes en el Post**: Los usuarios podrán dar likes y dislikes a los posts.
- **Estado del Post**: Los posts podrán tener un estado de Oculto o Visible.
- **Categorías del Post**: Los posts podrán clasificarse en categorías como deporte, política, videojuegos, etc.✅

### Funcionalidades Adicionales
- **Búsqueda (Search)**: El sitio deberá tener una funcionalidad de búsqueda para encontrar posts.
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
- **User**: Gestión de usuarios (registro, login, perfil, seguidores).
- **Post**: Gestión de posts (crear, editar, eliminar, likes, dislikes, estado, categoría).
- **Comment**: Gestión de comentarios en los posts.
- **Category**: Gestión de categorías de posts.
- **Follow**: Gestión de seguimientos entre usuarios.

### Vista (View)
- **Templates**: Plantillas HTML para mostrar los datos (login, registro, perfil, lista de posts, detalles del post, etc.).
- **Partials**: Componentes reutilizables (header, footer, sidebar, etc.).

### Controlador (Controller)
- **UserController**: Controlador para manejar acciones relacionadas con usuarios (login, registro, perfil).
- **PostController**: Controlador para manejar acciones relacionadas con posts (crear, editar, eliminar, mostrar).
- **CommentController**: Controlador para manejar acciones relacionadas con comentarios.
- **CategoryController**: Controlador para manejar acciones relacionadas con categorías.
- **FollowController**: Controlador para manejar acciones relacionadas con seguidores.

## Sugerencias para el Desarrollo
1. **Planificación**: Divide el proyecto en pequeñas tareas y establece un cronograma de trabajo.
2. **Repositorio Git**: Utiliza un repositorio Git para mantener un historial de cambios y facilitar el trabajo colaborativo.
3. **Pruebas Unitarias**: Implementa pruebas unitarias para asegurar el correcto funcionamiento de las funcionalidades.
4. **Documentación**: Documenta el código y las funcionalidades del proyecto para facilitar el mantenimiento y la colaboración.

¡Buena suerte con tu proyecto!