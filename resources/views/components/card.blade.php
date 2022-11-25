<div class="card mb-4">
    @isset($header)
    <div class="card-header fw-bold text-uppercase">
        {{ $header }}
    </div>
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
