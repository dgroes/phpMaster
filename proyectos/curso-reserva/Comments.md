# Comentarios

### C01: Sofdeletes
- Sofdeletes permite marcar un registro como "eliminado" sin realmente borrarlo de la BD.
- En lugar de eliminar el registro, se agrega una fecha en la columna 'deleted_at', indicando que el registro está eliminado de manera "lógica".
- Eso sirve para mantener un historial o permitir la recuperación de registros eliminados.

### C02: Campos rellenables
- Define los campos que pueden ser asignados en masa cuando se crea o actualiza un modelo.
- Protege la base de datos de asignaciones no seables, asegurando solo los campos especificados
- Si alguien intenta asignar valores a campos que no están en esta lista, Laravel ignorará esos valores, ayudando a prevenir vulnerabilidades como "Mass Assignment"

### C03: Relaciones
1. Relación role() (Uno a Muchos Inversa):
    - Define la relación entre un usuario y su rol.
    - Cada usuario pertenece a un rol (por ejemplo, administrador, cliente, etc.).
    - Es una relación inversa porque el modelo Role puede estar relacionado con muchos usuarios.
2. Relación reservations() (Uno a Muchos):

    - Establece que un usuario puede tener varias reservas asociadas.
    - Representa la relación de un cliente con las reservas que ha realizado.

3. Relación ConsultantReservation() (Uno a Muchos con clave personalizada):
    - Similar a la relación anterior, pero en este caso se utiliza una columna específica (consultant_id) para identificar las reservas en las que el usuario actúa como consultor o profesional asignado.
    - Esto permite distinguir el rol del usuario en el contexto de las reservas.


### C04: Relación uno a muchos inversa 
Este método indica que una reserva pertenece a un usuario, que generalmente es el cliente que hizo la reserva.

**Ejemplo práctico**:
- Piensa en una aplicación de reservas de citas. Si hay una reserva registrada, puedes usar este método para saber quién hizo la reserva.
- Por ejemplo, si una reserva tiene el ID 1, puedes ver que fue hecha por "Juan Pérez".


### C05: Relación uno a muchos inversa 
Este método indica que una reserva también puede estar asociada a otro usuario, que en este caso es el consultor o profesional que atenderá al cliente.
**Ejemplo práctico**:

- Siguiendo con el ejemplo de la aplicación de reservas, además de saber quién hizo la reserva, también puedes saber quién está asignado para atender esa reserva.
- Por ejemplo, si la reserva tiene el ID 1, puedes ver que será atendida por "Ana López", quien es la consultora asignada.


### C06: Response Json
El campo 'response_json' almacena la respuesta completa que el proveedor de pagos(PayPal) devuelve después de procesar una transacción.
- Registro detallado: Guarda todos los datos de la transacción, como código de error, automatizaciones, datos del clientes, o cualquier información espacífica que envié el proveedor.
- Autoriía: Si hay problemas o discrepancias en los pagos, puedes revisar esta info para vericiar qué ocurrió.
- Flexibilidad: Al ser un formato JSON, puedes guardar infromación estructurada y detallada, sin necesidad de crear múltiples columnas específicas en la tabla.

**Ejemplo**: un proveedor de pagos envía esta respuesta después de un pago:
```
{
  "transaction_id": "ABC123",
  "status": "approved",
  "amount": 50.00,
  "currency": "USD",
  "payer": {
    "id": "PAYER456",
    "email": "cliente@example.com"
  }
}
```
Usuando response_json guardas toda esta información como una cadena de texto en la BD, luego se puede utilizar par aanalizar o mostrar información específica.



### C07 - Seeders de usuarios
*Para este fichero se tiene que tener en cuenta el UserFactory*
- User::create(): Aquí creo un usuario especifico de manera manual
- User:factory(): Aquí creo 3 usuarios que deben tener un rol de consultor y 10 usuario que sean usuarios comunes


### C08 Inclusión de scripts @stack
**Su uso:**
La directiva @stack('scripts') es una herramienta de Laravel Blade 
que permite gestionar de manera flexible y organizada la inclusión de 
scripts específicos para cada vista en una aplicación web.

Funciona como un "espacio reservado" en el layout principal donde se 
inyectarán scripts adicionales definidos en las vistas secundarias 
usando la directiva @push. Esto tiene varias ventajas:

1. **Modularidad**: Los scripts específicos de una vista pueden 
   definirse directamente en esa vista, en lugar de tener que 
   incluirlos globalmente en el layout principal, manteniendo el 
   código más limpio y fácil de entender.

2.  **Evitar duplicaciones**: Solo se cargarán los scripts que 
   realmente necesiten las vistas, reduciendo el peso de las páginas 
   y optimizando la carga de recursos.


3.  **Flexibilidad**: Si en el futuro necesitas añadir más scripts a 
   una vista en particular, solo tendrás que usar @push en esa vista, 
   sin necesidad de modificar el layout global.

4. **Orden garantizado**: Los scripts se inyectan en el orden en el 
   que se definieron con @push, asegurando que todo funcione como se 
   espera incluso si hay dependencias entre los scripts.


Ejemplo de uso:

1. En el layout principal (`layout.blade.php`):
   @stack('scripts') indica el lugar donde se insertarán los scripts 
   adicionales.

2. En una vista secundaria (`home.blade.php`):
   Puedes usar @push('scripts') para agregar un script que se 
   insertará en la posición de @stack('scripts').

Este mecanismo es especialmente útil en aplicaciones complejas donde 
cada vista puede requerir scripts únicos, permitiendo mantener un 
código más organizado y eficiente.


### C09 Plantilla Guest
Es uarchivo de plantilla que generalmente se utiliza como un layout básico para las páginas que no requieren que el usuario esté autenticado en la aplicación. Por ejemplo, páginas como el inicio de sesión, registro, recuperación de contraseña, y otras páginas públicas suelen utilizar este layout.

#### Utilidad principal
Diseño mínimo y liviano:
- Proporciona una estructura básica de HTML con estilos y scripts necesarios para páginas públicas.
- No incluye elementos específicos para usuarios autenticados, como barras de navegación personalizadas o menús laterales.

#### Separación de layouts:
- Permite diferenciar entre el diseño de páginas públicas (usando guest.blade.php) y el diseño de páginas privadas (generalmente utilizando otro layout como app.blade.php o similar).

#### Facilita la modularidad:
- Si en el futuro necesitas cambiar el diseño de las páginas públicas, puedes hacerlo en un solo lugar, sin afectar las vistas privadas.


### C10 Cadenas de Traducción
Para poder traducir "cadenas de textos" utilizando localización, el utilizar las "Cadenas de traducción" ayudará para poner cambiarlo de idioma si lo deseamos.
Esto permite que el texto sea dinámico y multilingüe si estás utilizando archivos de localización.

#### Diferencia:
- Con __(): Soporta traducciones, útil para aplicaciones multilingües.
-  Sin __(): El texto es estático y no se traducirá automáticamente.

Usar __() es esencial si planeas soportar varios idiomas en tu aplicación.


### C11 Multipart Form Data
Permite enviar no solo texto, como campos de entrada normales, sino también archivos (como imágenes, documentos, etc.) y datos binarios al servidor.

Cuando subes un archivo a través de un formulario, los datos que contiene no se pueden codificar como texto plano (como sucede con el formato predeterminado application/x-www-form-urlencoded). Por eso, multipart/form-data divide el contenido del formulario en "partes" separadas, donde cada parte corresponde a un campo del formulario y sus datos, incluyendo los archivos.


### C12 Logout en Laravel
En Laravel, las rutas que maneja acciones como cerrar sesión generalmente requieren un método POST. Esto se debe a que, por convención, las operaciones que alterann el estado del sistema (como iniciar o cerrar sesión) no debería realizarse con un método GET, ya que GET se reserva para operaciones "idemponentes" (que no cambian de estado).

El simple enlace href="{{ route('logout') }}" enviaría una solicitud GET, pero Laravel espera un POST para la ruta de logout. Si intentaras acceder directamente al enlace, recibirías un error (normalmente un 405 Method Not Allowed).

#### Estrategia para usar POST com un enlace
Como no puedes usar directamente un botón con un método POST en un <a> (porque los enlaces envían solicitudes GET), se emplea un truco:
- El atributo onclick="event.preventDefault();" evita que el navegador siga el enlace.
- document.getElementById('logout-form').submit(); envía un formulario oculto que utiliza el método POST y apunta a la misma ruta de logout.

De esta forma, al hacer clic en el enlace, se activa el formulario oculto que cumple con el requisito de Laravel de recibir una solicitud POST.

#### Uso del formulario oculto
```
<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    @csrf
</form>
```
- Este formulario es el que realmente envía la solicitud POST a la ruta de logout.
- @csrf: Se incluye un token CSRF para proteger la solicitud contra ataques de falsificación (Cross-Site Request Forgery). Laravel requiere este token para validar cualquier solicitud POST.
- style="display: none;": Oculta el formulario para que no sea visible en la interfaz de usuario, ya que no se necesita interacción directa del usuario con él.

#### ¿Por qué no basta solo con el href?
Usar solo el href enviaría una solicitud GET, lo que:
- Violenta la semántica de los métodos HTTP.
- Podría generar problemas de seguridad o errores si la ruta no está configurada para manejar solicitudes GET.


### C13 Relaciones en views
Si utilizamos *$usuario->rol*, solo devolvería un ID del tipo de rol. Gracias a Laravel podemos con nuestras relaciones ya previamente hechas llamar desde usuario y luego a roles así: $usuario->role->name. Sería como un Inner Join


### C14 Pluck
El método pluck en Laravel sirve para extraer valores específicos de una colección o conjunto de registros. 
```
$userIds = User::where('rol_id', 3)->pluck('id')->toArray();
```
¿Qué hace exactamente?
1. where('rol_id', 3): Filtra los registros de la tabla users, seleccionando solo aquellos donde el campo rol_id sea igual a 3 (en este caso, los usuarios que son clientes).

2. pluck('id'): Extrae únicamente los valores de la columna id de los registros que coinciden con el filtro anterior. Devuelve una colección de los IDs de los usuarios.

3. toArray(): Convierte esa colección en un array simple de PHP.

Para qué sirve en este contexto?
El propósito de esta línea es obtener una lista de los IDs de los usuarios que cumplen con la condición (rol_id = 3). Posteriormente, esa lista ($userIds) probablemente se usará para:

Generar datos aleatorios para clientes específicos.
Asignar relaciones en un modelo de pruebas (por ejemplo, en un Factory o Seeder).
Cualquier otra operación que requiera trabajar solo con los usuarios de rol 3.

El método pluck aquí se utiliza para simplificar la obtención de una lista específica (en este caso, los IDs de los usuarios con rol_id = 3). Es una forma eficiente de trabajar solo con la información necesaria, sin cargar todos los campos de la base de datos.


### C15 Sprintf
El método  sprintf() sirve para fomatear cadenas de texto de acuerdo con un formato específico.

%02d:

%d: Indica que se va a insertar un número entero.

02: Indica que el número debe tener al menos 2 dígitos, y si tiene menos, se rellenará con ceros a la izquierda.

:00:

Esto es texto literal que se agrega después del número formateado. Representa minutos en este caso.

$starTime:

Es el valor que se inserta en el formato especificado.
