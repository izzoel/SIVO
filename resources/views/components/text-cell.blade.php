@props (['text' => '', 'warna' => ''])
<span
    class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium"
    style="background-color: {{ $warna ?? '#f59e0b' }}; color: {{\App\Support\ColorHelper::textColorForBackground($warna ?? '#f59e0b')}}"
>
    {{ $text }}
</span>
