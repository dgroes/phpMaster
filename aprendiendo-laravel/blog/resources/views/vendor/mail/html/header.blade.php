@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@elseif(trim($slot) === 'dgroes')
<img src="https://avatars.githubusercontent.com/u/91085485?v=4?s=400" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>



