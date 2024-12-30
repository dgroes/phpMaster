## Comentarios del archivo edit.blade.php

## Comentario 01
Este comentario explica la lógica del input "title" en el formulario:
- Utiliza `old('title')` para mantener el último valor ingresado por el usuario en caso de error.
- Si no hay errores, toma el valor actual de la tarea desde `$task->title`.
- Esto mejora la experiencia del usuario evitando la pérdida de datos al enviar el formulario.

## Comentario 02
**Input de tags en edit.blade.php**
- **`name="tags[]"`:** Permite manejar múltiples tags como un array en el servidor.
- **`value`:** 
  1. Si existe un error de validación, muestra los tags ingresados previamente (`old('tags')`).
  2. Si la tarea tiene tags almacenados, los muestra (`$task->tags`).
  3. Si no hay datos previos, el campo aparece vacío.
