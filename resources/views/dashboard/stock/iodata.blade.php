<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md">
            <x-card header="Sparepart Data">
                <div class="row">
                    @foreach($datas as $data)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$data->name}}
                                </h5>
                                <div class="card-text">
                                    <p>telp : {{ $data->tlp }}</p>
                                    <p>Email : {{ $data->email }}</p>
                                    <p>address : {{ $data->address }}</p>
                                </div>
                                <a
                                    href="/dashboard/stock/inv/{{ $data->slug }}"
                                    class="btn btn-primary"
                                    >Go somewhere</a
                                >
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            {{ $datas->links() }}
        </div>
    </div>
</x-admin-layout>
