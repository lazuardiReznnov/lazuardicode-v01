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

            <x-headsidenav title="Administrator"> </x-headsidenav>

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

            <!-- uNIT -->
            @can('view unit')
            <x-headsidenav title="Unit-Management"> </x-headsidenav>
            <x-collapselink titlecols="Unit-Data">
                <x-navlink link="/dashboard/unit/brand">Brand Unit</x-navlink>
                <x-navlink link="/dashboard/unit/category"
                    >Category Unit</x-navlink
                >
                <x-navlink link="/dashboard/unit/carosery"
                    >Karoseri Unit</x-navlink
                >
                <x-navlink link="/dashboard/unit/group">Group Unit</x-navlink>
                <x-navlink link="/dashboard/unit/flag">Flag Unit</x-navlink>
                <x-navlink link="/dashboard/unit/type">Types Unit</x-navlink>
                <x-navlink link="/dashboard/unit">Unit</x-navlink>
            </x-collapselink>
            <x-collapselink titlecols="Letter">
                <x-navlink link="/dashboard/unit/letter">Letter Unit</x-navlink>
                <x-navlink link="#">Category Unit</x-navlink>
            </x-collapselink>
            @endcan
            <!-- ENDUNIT -->

            @can('view stock')
            <x-headsidenav title="Stock-Management"> </x-headsidenav>
            <x-collapselink titlecols="Stock-Data">
                <x-navlink link="/dashboard/stock">Stock item</x-navlink>
                <x-navlink link="/dashboard/stock/supplier">Supplier</x-navlink>
            </x-collapselink>
            @endcan @can('view maintenance')
            <x-headsidenav title="Maintenance-Management"> </x-headsidenav>
            <x-collapselink titlecols="Maintenance-Data">
                <x-navlink link="/dashboard/maintenance"
                    >maintenance item</x-navlink
                >
            </x-collapselink>
            @endcan

            <x-headsidenav title="Employee-Management"> </x-headsidenav>
            <x-collapselink titlecols="employee-Data">
                <x-navlink link="/dashboard/employee">Employee</x-navlink>
            </x-collapselink>
            <x-headsidenav title="Track-Transaction"> </x-headsidenav>
            <x-collapselink titlecols="Track-Data">
                <x-navlink link="/dashboard/track">Track</x-navlink>
            </x-collapselink>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}
    </div>
</nav>
