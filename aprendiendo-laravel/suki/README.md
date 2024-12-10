<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sobre el proyecto
**Suki** es un proyecto de práctica, cuyo fin es aprender Laravel 11 utilizando Breeze, será un proyecto pequeño que no busca crear una apliación espectacular, solo busca aprender y entender este Framework y todo lo que puede ofrecer para crear.

# Gestor de Tareas Personales

## Descripción

Crea una aplicación simple para gestionar tareas personales. Incluye funcionalidades como:

- Registro, inicio de sesión y autenticación (Breeze se encarga de esto).
- Creación, edición y eliminación de tareas (CRUD).
- Organización de tareas por estado: "Pendiente", "En Progreso", "Completada".
- Envío de recordatorios por correo para tareas con fechas límite.
- Generación de un reporte básico (en PDF o Excel) de las tareas.

---

## Funcionalidades Principales

1. **Autenticación:**
   - Usa Breeze para manejar el registro, inicio de sesión y restablecimiento de contraseñas.
   - Personaliza las vistas de Breeze según tu diseño.

2. **Gestión de Tareas (CRUD):**
   - Un usuario autenticado puede:
     - Crear nuevas tareas.
     - Editar detalles de tareas.
     - Marcar tareas como "Pendiente", "En Progreso" o "Completada".
     - Eliminar tareas.

3. **Notificaciones por Correo Electrónico:**
   - Usa **Laravel Mailables** para enviar correos automáticos:
     - Recordatorios de tareas próximas a vencer.
     - Confirmaciones cuando una tarea es completada.

4. **Reportes de Tareas:**
   - Genera un reporte (en formato PDF o Excel) de todas las tareas, organizado por estado.
   - Usa **Laravel Excel** o **DomPDF** para generar y descargar reportes.

5. **Sistema de Paginación:**
   - Implementa paginación para mostrar las tareas en varias páginas.

---

## Herramientas y Características que Aprenderás

1. **Eloquent ORM:**
   - Relación uno-a-muchos entre usuarios y tareas.

2. **Blade:**
   - Diseña las vistas con Blade, utilizando CSS puro para los estilos.

3. **Laravel Mailables:**
   - Configura y envía correos electrónicos con plantillas personalizadas.

4. **Validación de Formularios:**
   - Aprende a validar datos antes de guardarlos en la base de datos.

5. **Rutas y Controladores:**
   - Configura rutas protegidas para usuarios autenticados.

6. **Middleware:**
   - Usa middleware como `auth` para proteger rutas.

7. **Generación de PDFs o Excels:**
   - Usa paquetes como `barryvdh/laravel-dompdf` o `maatwebsite/excel`.

---

## Estructura del Proyecto

### Base de Datos

- Tabla `users` (Breeze ya la configura).
- Tabla `tasks`:
  - `id` (integer, primary key).
  - `user_id` (integer, relación con `users`).
  - `title` (string, título de la tarea).
  - `description` (text, descripción de la tarea).
  - `status` (enum: "Pendiente", "En Progreso", "Completada").
  - `due_date` (date, fecha límite de la tarea).
  - `created_at`, `updated_at` (timestamps).
