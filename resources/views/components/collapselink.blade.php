<a
    class="nav-link collapsed"
    href="#"
    data-bs-toggle="collapse"
    data-bs-target="#collapse{{ $titlecols }}"
    aria-expanded="false"
    aria-controls="collapse{{ $titlecols }}"
>
    <div class="sb-nav-link-icon">
        <i class="fas fa-columns"></i>
    </div>
    {{ $titlecols }}
    <div class="sb-sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapse{{ $titlecols }}"
    aria-labelledby="headingOne"
    data-bs-parent="#sidenavAccordion"
>
    <nav class="sb-sidenav-menu-nested nav">
        {{ $slot }}
    </nav>
</div>
