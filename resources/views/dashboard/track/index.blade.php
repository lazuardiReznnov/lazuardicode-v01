<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>
    <x-card>
        <nav class="nav">
            <a class="nav-link" href="/dashboard/track/customer">Customer</a>
            <a class="nav-link" href="/dashboard/track/transaction"
                >Transaction</a
            >
        </nav>
    </x-card>
    <x-card>
        <h4>
            Track Date :
            {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
        </h4>
        <ol class="list-group list-group-numbered col-md-6">
            <li class="list-group-item">A list item</li>
            <li class="list-group-item">A list item</li>
            <li class="list-group-item">A list item</li>
        </ol>
    </x-card>
</x-admin-layout>
