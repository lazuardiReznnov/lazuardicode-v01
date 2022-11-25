<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Dashboard"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link-active> Dashboard </x-breadcrumb-link-active>
    </x-breadcrumb>

    <x-card>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session("status") }}
        </div>
        @endif

        {{ __("You are logged in!") }}
    </x-card>
</x-admin-layout>
