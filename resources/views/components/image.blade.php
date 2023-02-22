<div>
    @if ($path)
        <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}">
    @else
        <img src="{{ asset('no_img.png') }}" alt="" width="{{ $width }}" height="{{ $height }}">
    @endif
</div>