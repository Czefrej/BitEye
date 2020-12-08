<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BitEye')
<img src="http://biteye.pl/assets/biteye.png" height="100px" class="logo" alt="BitEye Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
