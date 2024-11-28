<x-mail::message>
# Correo por aprobar
### Este es un mail de prueba utilizando MailTrap

<x-mail::panel>

Se hac creado un nuevo post que necesita ser aprobado

</x-mail::panel>


<x-mail::button :url="route('posts.show', $post)"
    color="success">
Click aquí para aprobar
</x-mail::button>

</x-mail::message>
