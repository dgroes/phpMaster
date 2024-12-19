<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Mini Proyecto: Lista de Tareas con Laravel y Breeze

## **1. Configuración Inicial**
- Instala Laravel en tu máquina.
- Crea un nuevo proyecto Laravel.
- Configura tu base de datos en el archivo `.env`.
- Instala y configura Breeze con TailwindCSS.

---

## **2. Autenticación**
- Verifica que el sistema de autenticación (registro y login) funciona correctamente.

---

## **3. Creación del Modelo y la Migración**
- Crea el modelo `Task` con su migración correspondiente.
- Define los campos necesarios para las tareas en la tabla.

---

## **4. Relaciones**
- Establece una relación entre las tareas y los usuarios en el modelo `Task`.

---

## **5. Creación del Controlador**
- Crea un controlador para manejar las tareas (`TaskController`).
- Define los métodos para:
  - Mostrar la lista de tareas.
  - Crear una nueva tarea.
  - Editar una tarea.
  - Eliminar una tarea.
  - Marcar una tarea como completada.

---

## **6. Rutas**
- Configura las rutas necesarias para las operaciones CRUD de las tareas.

---

## **7. Vistas**
- Diseña las vistas para:
  - Mostrar la lista de tareas del usuario autenticado.
  - Formulario para crear y editar tareas.
  - Confirmación de eliminación de tareas.

---

## **8. Integración con TailwindCSS**
- Aplica estilos básicos con TailwindCSS para una presentación mínima y funcional.

---

## **9. Validación**
- Añade validación a los formularios para garantizar que los datos ingresados sean válidos.

---

## **10. Pruebas**
- Prueba el sistema manualmente:
  - Crea tareas.
  - Edita tareas.
  - Marca tareas como completadas.
  - Elimina tareas.
- Verifica que las restricciones de usuario funcionan correctamente (cada usuario solo puede ver y gestionar sus propias tareas).

---

## **11. Documentación**
- Crea un archivo `README.md` que explique:
  - Cómo instalar y configurar el proyecto.
  - Cómo usar la aplicación.

---

## **12. Opcional: Mejora Continua**
- Agrega nuevas características, como:
  - Filtros para tareas completadas y pendientes.
  - Sistema de prioridad para las tareas.
  - Integración con notificaciones por correo.
