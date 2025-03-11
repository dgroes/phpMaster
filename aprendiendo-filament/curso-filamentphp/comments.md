# Notas importantes

### Laravel World, Countries States Cities DB Migration & Seeder
Se instala el paquete "Laravel World, Countries States Cities DB Migration & Seeder" (altwaireb/laravel-world) para creación de seeders de cuidades: https://packagist.org/packages/altwaireb/laravel-world

### Como filmanet detectó las tablas del paquete laravel-world
Filament detectó automáticamente las tablas del paquete altwaireb/laravel-world porque Laravel utiliza convenciones de nombres para modelos y bases de datos. Filament sigue esas mismas convenciones al generar recursos.
Al instalar laravel-world, se ejecutaron las migraciones, lo que significa que la estructura de las tablas ya estaba creada antes de generar los recursos con Filament.
Por consiguiente, cuando se ejecuta `php artisan make:filament-resource Countries --generate` Filament hizo lo siguiente:
1. Detecta la exitencia del modelo
. Filament busca un modelo llamado Country en app/Models/.
. Si el paquete altwaireb/laravel-world ya incluye un modelo Country en Altwaireb\World\Models\Country, Laravel puede encontrarlo gracias al aoutoload de composer

2. Verifica la tabla en la base de datos
- Laravel usa nombres de tabla en plural por convención (countries para Country).
- Como el paquete ya migró y pobló las tablas (countries, states, cities), Filament puede leerlas.

3. Genera los archivos del recurso
- Filament usa php artisan make:filament-resource para generar:
    - CountriesResource.php
    - CountriesResource/Pages
    - CountriesResource/RelationManagers
- Analiza los atributos del modelo para crear los formularios y las tablas.

### Paneles
Dentro del proyecto se encuentran 2 paneles: Dashboard(Administrativo) y Personal (Usuarios comúnes)

Documentación: "https://filamentphp.com/docs/3.x/panels/resources/getting-started"

### Generación de recursos con o sin `--generate`
#### Sin `--generate`
`php artisan make:filament-resource Customer`
- Solo genera la clase CustomerResource.php en app/Filament/Resources/.
- No incluye las páginas CRUD, solo la estructura básica del recurso.
- Debes agregar manualmente las páginas (ListCustomers, CreateCustomer, EditCustomer, etc.).

#### Con `--generate`
- Genera la clase CustomerResource.php.
- Además, crea automáticamente las páginas CRUD en `app/Filament/Resources/CustomerResource/Pages/`:
    - ListCustomers.php → Para listar registros.
    - CreateCustomer.php → Para crear un registro.
    - EditCustomer.php → Para editar un registro.
- Esto te ahorra trabajo porque ya tienes el CRUD funcional desde el inicio.
- Detecta los compos de la tabla, generando los inputs correspondientes para todos los atributos de la tabla.


# Comentario extensos del proyecto de curso

### XX: Creación de recursos filament
Se crearón varios recursos de filamente (usuario, pais, estado y cuidad), para su manejo y admisntración con filament.
Mas info en "https://filamentphp.com/docs/3.x/panels/resources/getting-started"

### C00: Creación de perfil de Adminstrador con Seed
Creación de un perfil para su utilización posterior como un Adminstrador, además se puede crear un usuario utilizando el comando `php artisan make:filament-user`


### C01: Cambiar nombre del recurso
Dentro de UserResource se cambión el nombre por defecto de "Users" a "Employees", esto con la línea: `$navigationLabel = "Employees"`, esto hace que en nuestra navegación (en este caso nuestro dashboard), en la parte de los recursos, no aparezca "Users" sino que ahora aparece "Employees". 
Entonces solo cambia el nombre para la persona que está utilizando el Dashboard, pero en la BD sigue siendo la tabla "Users".


### C02: Agregar nuevos campos a la tabla Users
Agregamos los campos en base a las tablas de `laravel-world`, además no será necesario especificar de donde hacemos las relaciones, ya que Laravel dectecta en a cual tabla debería realizar las relaciones.
Luego de hacer las migraciones con `php artisan migrate`, se actualizará nuestra tabla de usuarios, pero no lo hará nuestro Dashboard de Filament, seguirán los campos sin los nuevos que acabamos de crear. Para eso será necesario ir a `app\Filament\Resources\UserResource.php` y en ee fichero cambiamos la visualización que debería mostrar en nuetro dashboard

### C03: Agregar sección a formulario
Siguiendo el comentario anterior ahora será necesario importar la Section Form (`https://filamentphp.com/docs/3.x/forms/layout/section`), además será necesario importar `use Filament\Forms\Components\Section`. Se esta forma en nuestro crear usuario cambiará la estrucura el formulario


### C04: Agregar nueva sección al formulario con una relación
Al crear una sección u otro formato en base a una relación entre tablas, antes será necesario crear dicha relación en `app\Models\User.php`, creando una función en la cual se cree dicha relación. 


### C05: Select en base al Pais
`State::query()` → Inicia una consulta en la tabla de estados.

`->where('country_id', $get('country_id'))` → Filtra los estados que pertenecen al país seleccionado en country_id.

`->pluck('name', 'id')` → Devuelve un array donde las claves son los id de los estados y los valores son los nombres de los estados.

Entonces en lugar de por ejemplo traer todos los estados, solo mmostrará los estados pertenecientes al país seleccionado previamente. Una forma de hacer un Select dependiente (carga dináamica de opciones).


### C06: Agregar los campos al $fillable en el modelo User
Será importante agregar los campos aceptados en el $fillable dentro del Modelo, especificar los campos nuevos que se agregarón

### C07 Cambiar icono del recurso
Para cambiar el icono de un recurso será importante obtener los códigos de los iconos que están en esta ruta de Fillament, los cuales son iconos soportados por Blade:
https://blade-ui-kit.com/blade-icons?set=1&search=users#search

Además podemos utilizar HeroIcons:
https://heroicons.com/
En el caso de heroicons debe ser `heroicon-o-` seguido del **nombre** del icon, por ejemplo si el icono se llama: `table-cells` deberá llamarse `heroicon-o-table-cells`

En la documentación hay más info:
https://filamentphp.com/docs/3.x/support/icons


### C08: Cambiar grupo de navegación
Para agrupar los recursos en un grupo será neseario crear una variable el cual será `Employees Management `el cual almacenará otros recursos, en este caso los de Getión de Empleados. Para la gestión de direcciones se creó `System Management`

### C09: Cambiar orden de navegación
Para cambiar el orden de la navegación, se crea una variable `?int $navigationSort = 2;`. El 2 indica la posición, por lo que en el resto de recursos será importante cambiar su posición para que no interfieran entre ellas, por ejemplo en gestión de empleados se utilizó el orden "2", pero en la gestión de sistemas se utilizón el orden "3".

Si hay disntos grupos dentro de la navegación, el número de orden será a **nivel general**. Por ejemplo si está el grupo **Instrumentos** que tiene Guitarras y Baterías; luego otro grupo **Amplificadores** con balbulares y transistores. pues el orden sería así:

- guitarras "1"
- beterias "2"
- balbulares "3"
- transistores "4"

de esa forma aparecerá así en la navegación:

Instrumentos:
- Guitarras
- Baterías

Amplificadores
- Balbulares
- Transistores


### 10: Tablas Pivote
En una relación de **muchos a muchos**, cada entidad puede estar relacionada con múltiples registros de la otra.  

#### **Usuarios y Calendarios**  
El método `belongsToMany(Calendar::class)` indica que:  
- Un **usuario** puede estar asociado a **múltiples calendarios**.  
- Un **calendario** puede estar asociado a **múltiples usuarios**.  

Para gestionar esta relación, se necesita una **tabla pivote**. Por ello, se creó la tabla `table_user_calendar`, que contiene solo las claves foráneas (`user_id`, `calendar_id`) que vinculan a ambas entidades.  

##### **Otras Relaciones**  
De manera similar, la tabla `table_user_departament` se usa para gestionar la relación **muchos a muchos** entre **usuarios y departamentos**.  

Ambas tablas pivote permiten que las relaciones sean eficientes y escalables, evitando la duplicación de datos y facilitando las consultas.


### C:11 Personalización de Querys
Para poder personalizar las `querys`, y por ejemplo mostrar solo las consultas en base al usuario logeado se puede hacer con `getEloquentQuery`

Mas info en el link: Customizing the resource Eloquent query (https://filamentphp.com/docs/3.x/panels/resources/getting-started)



### C12: Modificar o agregar datos antes de guardar los datos en la BD
El método `mutateFormDataBeforeCreate()` se usa **para modificar o agrega datos antes de que se guarden en la base de datos al crear un nuevo registro** en un recurso de Filament

Cuando por ejemplo un usuario llena un formulario de creación en Filament, antes de que lod datos se guarden en la base de datos, puedes modificarlos o agrega información automáticamente con este método

Por ejemplo en el fichero: "app\Filament\Personal\Resources\HolidayResource\Pages\CreateHoliday.php". Se encuentra el método `mutateFormDataBeforeCreate`, en el formulario de creación solo están los campos de "Calendar" y "Day". pero con este método agregamos a ese submit datos que quermos rellenar automáticamente. Esto es importante ya que la tabla Holiday además de un "Calendario_ID" y un "Dia", espera adémas un "Usuario_id" y un "Tipo". En el ejmplo de Personal/Holiday se puede apreciar que le pasamos el id del usuario que actualmente logeado y el tipo, que por defecto la solicitud de vacaciones estará pendiente

Otra cosa importante, en base al ejemplo de Personal/Holiday, tambien con eso si editamos por ejemplo la fecha de una solicitud de vacaciones esta tambien fucionará sin agregar nada más. Ya que como las Holidays creadas ya tienen un identificador se actualizaría de esa forma

Más info en **Customizing data before saving**: (https://filamentphp.com/docs/3.x/panels/resources/creating-records)


### C13: Header Actions
Agregar una action (botón) en el header, en el caso de el fichero (Personal\Resources\TimesheetResource\Pages\ListTimesheets.php) será un botón de action en el header de la view de la Lista de Hojas de Tiempo dentro de Personal


Mas info en: "https://filamentphp.com/docs/3.x/panels/pages#header-actions"
Mas info sobre la acciones avanzadas: "https://filamentphp.com/docs/3.x/actions/advanced"
Mas info sobre las actions modals: https://filamentphp.com/docs/3.x/actions/modals

Mas info para aciones en botones: https://filamentphp.com/docs/3.x/actions/trigger-button


### C14: Hoza horaria
Para establecer la zona horaria personalizada bastará con establecer dicha zona en el fichero de `config\app.php` agregando en el caso de este proyecto la zona de chile: `'timezone' => 'America/Santiago',`

De manera opción tambien se puede configurar en `.env` con la siguiente línea: `APP_TIMEZONE=America/Santiago`. En esta opción será igual recomendable limpiar el caché de configuración para que se apliquen los cambios del fichero con el siguiente comando: `php artisan config:clear`. 


### C15: Notifiación de acción
Luego de que la acción se ejecute corerctamente se enviará una notifiación 

Mas info en: "https://filamentphp.com/docs/3.x/notifications/sending-notifications"


## Prueba de Ubuntu 