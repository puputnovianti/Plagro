<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="/public/img/logoplagro.png" class="logo" alt="Plagro.id">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
