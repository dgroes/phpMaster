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
