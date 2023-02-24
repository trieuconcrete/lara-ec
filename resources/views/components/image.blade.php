<div>
    @if ($path)
        <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}" class="{{ $class }}">
    @else
        <img src="{{ asset('no_img.png') }}" alt="" width="{{ $width }}" height="{{ $height }}" class="{{ $class }}">
    @endif
</div>