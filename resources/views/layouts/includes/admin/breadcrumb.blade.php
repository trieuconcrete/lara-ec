@if (session('message'))
    <div class="alert alert-success" role="alert">
        {!! session('message') !!}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {!! session('error') !!}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap">
    <div class="d-flex align-items-end flex-wrap">
        <div class="d-flex">
            <i class="mdi {{ $icon }} hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{ $title }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">
        @if (isset($functions))
            @foreach ($functions as $func)
            <a href="{{ $func['route'] }}" @if(isset($func['modal'])) data-bs-toggle="modal" data-bs-target="{{ $func['modal_name'] }}" @endif>
                <button type="button" class="btn btn-outline-primary btn-icon {{ $func['class'] ?? '' }} @if (!$loop->last) me-3 @endif mt-2 mt-xl-0">
                    <i class="mdi {{ $func['icon'] }}"></i>
                </button>
            </a>
            @endforeach
        @endif
    </div>
</div>