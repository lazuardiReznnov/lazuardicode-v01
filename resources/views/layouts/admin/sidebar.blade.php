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

            <x-headsidenav title="Administrator">
                <x-iconlink>
                    <i class="fas fa-tachometer-alt"></i>
                </x-iconlink>
            </x-headsidenav>

            <x-collapselink titlecols="User">
                @can('view user')
                <x-navlink link="/dashboard/user">List User</x-navlink>
                @endcan @can('show user')
                <x-navlink link="/dashboard/user/profil">Profil</x-navlink>
                @endcan
                <x-navlink link="#">Role Management</x-navlink>
            </x-collapselink>
            @can('view role')
            <x-collapselink titlecols="Authentication">
                <x-navlink link="/dashboard/authentication"
                    >Authentication</x-navlink
                >
                <x-navlink link="/dashboard/authentication/role"
                    >Role</x-navlink
                >
                <x-navlink link="/dashboard/authentication/permission"
                    >Permission</x-navlink
                >
            </x-collapselink>
            @endcan @can('View Page')
            <x-collapselink titlecols="Page">
                <x-navlink link="/dashboard/page"> Page </x-navlink>
            </x-collapselink>
            @endcan
            <x-collapselink titlecols="Menu">
                <x-navlink link="#">Component</x-navlink>
            </x-collapselink>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}
    </div>
</nav>
