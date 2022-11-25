<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <x-headsidenav title="Dashboard"></x-headsidenav>

            <x-navlink link="/dashboard">
                <x-iconlink>
                    <i class="fas fa-tachometer-alt"></i>
                </x-iconlink>
                Dashboard
            </x-navlink>

            <x-headsidenav title="Interface"></x-headsidenav>

            <x-collapselink titlecols="User">
                <x-navlink link="#">Component</x-navlink>
                <x-navlink link="#">Component</x-navlink>
            </x-collapselink>

            <x-collapselink titlecols="Menu">
                <x-navlink link="#">Component</x-navlink>
            </x-collapselink>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
