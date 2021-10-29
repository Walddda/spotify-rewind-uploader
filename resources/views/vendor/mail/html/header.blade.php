<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Beatchain')
<img src="https://static.thenounproject.com/png/1263141-200.png" class="logo" alt="Beatchain Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
