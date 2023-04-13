@if (session('success'))
<!-- Success Alert -->
<div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
    <i class="ri-notification-off-line me-3 align-middle"></i> {!! session('success') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('error'))
<!-- Danger Alert -->
<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
    <i class="ri-error-warning-line me-3 align-middle"></i> {!! session('error') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('message'))
<!-- Info Alert -->
<div class="alert alert-info alert-border-left alert-dismissible fade show" role="alert">
    <i class="ri-airplay-line me-3 align-middle"></i> {!! session('message') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif