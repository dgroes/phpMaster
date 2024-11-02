# Proyecto: Planificador de Hábitos y Tareas

## Caso de Desarrollo

### Objetivo General
Desarrollar una aplicación en PHP que permita a los usuarios crear y administrar tareas y hábitos diarios, realizar un seguimiento de su progreso y recibir recordatorios para tareas pendientes.

### Características Clave
1. **Gestión de Tareas y Hábitos**:
   - Creación, edición y eliminación de hábitos y tareas.
   - Cada tarea incluye una descripción, fecha límite, y un estado (completada o pendiente).
   - Posibilidad de marcar tareas como completadas.

2. **Visualización de Progreso**:
   - Un panel muestra el progreso diario o semanal mediante gráficos para ayudar al usuario a visualizar su avance.

3. **Recordatorios**:
   - Envío de recordatorios automáticos para tareas próximas a vencer, utilizando una API de notificaciones (por ejemplo, Twilio para SMS o email).

---

## Orden de Desarrollo

### 1. Diseño de la Base de Datos
   - **Objetivo**: Crear una base de datos bien estructurada que soporte la lógica de hábitos y tareas.
   - **Acciones**:
     - Define las tablas principales: `users`, `tasks`, `habits`, `notifications`.
     - Define relaciones:
       - `tasks` y `habits` deben estar asociados a `users`.
       - `notifications` deben estar relacionadas con `tasks` o `habits`.
     - Crea la base de datos y tablas utilizando SQL.

### 2. Desarrollo del Modelo (POO)
   - **Objetivo**: Crear las clases principales para organizar los datos y la lógica de negocio.
   - **Acciones**:
     - Clase `User`: manejo de datos del usuario (nombre, email, etc.) y autenticación.
     - Clase `Task` y `Habit`: gestión de los atributos de tareas y hábitos (`id`, `user_id`, `description`, `due_date`, `is_completed`, etc.).
     - Clase `Notification`: genera y envía notificaciones.
     - Define métodos en cada clase como `createTask()`, `completeTask()`, `getUserHabits()`, `sendReminder()`, entre otros.

### 3. Configuración de la API de Recordatorios
   - **Objetivo**: Integrar una API de notificaciones para enviar recordatorios automáticos.
   - **Acciones**:
     - Regístrate y obtén las credenciales para la API de Twilio (o similar).
     - Implementa métodos en la clase `Notification` para conectar con la API y enviar recordatorios.
     - Define una lógica para enviar recordatorios basados en la fecha/hora de cada tarea.

### 4. Creación de la Interfaz de Usuario
   - **Objetivo**: Construir la interfaz donde los usuarios interactúan con la aplicación.
   - **Acciones**:
     - Implementa un diseño con una librería CSS (opcional) para el formulario de registro de usuarios, la página principal de hábitos/tareas, y la vista de progreso.
     - Usa JavaScript y AJAX para manejar algunas interacciones dinámicas, como el marcado de tareas completadas sin recargar la página.

### 5. Conexión de la Interfaz con el Backend
   - **Objetivo**: Integrar el frontend con el backend para hacer la aplicación funcional.
   - **Acciones**:
     - Crea controladores PHP para cada funcionalidad (como `TaskController` y `HabitController`), que manejen las solicitudes de la interfaz y llamen a los métodos correspondientes en los modelos.
     - Configura AJAX para actualizar el estado de las tareas o mostrar el progreso sin recargar la página.

### 6. Implementación del Sistema de Visualización de Progreso
   - **Objetivo**: Mostrar un resumen visual del progreso del usuario mediante gráficos.
   - **Acciones**:
     - Usa Chart.js u otra librería de gráficos para mostrar los datos de tareas/hábitos completados en gráficos de barra o línea.
     - Integra la visualización de estos datos en el dashboard del usuario, con opciones para ver el progreso diario, semanal o mensual.

### 7. Pruebas y Validación
   - **Objetivo**: Asegurar que la aplicación funcione correctamente y esté libre de errores.
   - **Acciones**:
     - Realiza pruebas unitarias en los métodos de cada clase.
     - Realiza pruebas de integración para verificar que los controladores y vistas funcionen bien juntos.
     - Verifica la funcionalidad de la API de notificaciones y la seguridad de la base de datos.

---

## Resumen de Tareas

1. **Diseño de la Base de Datos**
2. **Desarrollo del Modelo (POO)**
3. **Configuración de la API de Recordatorios**
4. **Creación de la Interfaz de Usuario**
5. **Conexión de la Interfaz con el Backend**
6. **Implementación del Sistema de Visualización de Progreso**
7. **Pruebas y Validación**

---

Este flujo permite desarrollar el proyecto paso a paso, asegurando que cada parte esté bien diseñada y probada antes de avanzar a la siguiente. ¡Éxito en el desarrollo!
