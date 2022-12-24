<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a class="text-decoration-none" href="/dashboard/page/hero"
                        >Hero Page</a
                    >
                </li>
                <li class="list-group-item">
                    <a class="text-decoration-none" href="/dashboard/page/about"
                        >About Page</a
                    >
                </li>
                <li class="list-group-item">
                    <a
                        class="text-decoration-none"
                        href="/dashboard/page/portofolio"
                        >Portofolio Page</a
                    >
                </li>
                <li class="list-group-item">
                    <a
                        class="text-decoration-none"
                        href="/dashboard/page/footer"
                        >Footer Page</a
                    >
                </li>
                <li class="list-group-item">
                    <a
                        class="text-decoration-none"
                        href="/dashboard/page/heading"
                        >Title & Heading Page</a
                    >
                </li>
            </ul>
        </div>
    </div>
</x-admin-layout>
