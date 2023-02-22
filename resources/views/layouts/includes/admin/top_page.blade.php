<div class="d-flex justify-content-between flex-wrap">
    <div class="d-flex align-items-end flex-wrap">
        <div class="d-flex">
            <i class="mdi {{ $icon }} hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{ $title }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">
        @foreach ($functions as $button)
        <a href="{{ $button['route'] }}" @if(isset($button['modal'])) data-bs-toggle="modal" data-bs-target="{{ $button['modal_name'] }}" @endif>
            <button type="button" class="btn btn-outline-primary btn-icon {{ $button['class'] ?? '' }} @if (!$loop->last) me-3 @endif mt-2 mt-xl-0">
                <i class="mdi {{ $button['icon'] }}"></i>
            </button>
        </a>
        @endforeach
    </div>
</div>