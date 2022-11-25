<x-admin-layout title="{{ $title }}">
    <div class="container-fluid px-4">
        <x-HeadTitle title="Dashboard"> </x-HeadTitle>
        <x-card header="Header Card">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session("status") }}
            </div>
            @endif

            {{ __("You are logged in!") }}
        </x-card>
    </div>
</x-admin-layout>
