<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/iodata">
            Billing List
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-8">
            @if(session()->has('success'))
            <x-card>
                <!-- pesan -->

                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    {{ session("success") }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="close"
                    ></button>
                </div>

                <!-- endpesan -->
            </x-card>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <x-card header="{{ $invStock->name }}">
                <div class="row my-2">
                    <div class="col-md">
                        <a
                            href="/dashboard/stock/create/{{ $invStock->slug }}"
                            class="btn btn-primary btn-sm"
                            >Add Item</a
                        >
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th scope="col">Date</th>
                            <th scope="col">Sparepart</th>
                            <th scope="col">Qty</th>
                            <th scope="col" class="text-md-end">price</th>
                            <th scope="col " class="text-md-end">Sum</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandtotal =0; @endphp @if($datas->count())
                        @foreach($datas as $data)
                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>

                            <td>
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d/m/Y') }}
                            </td>

                            <td>{{ $data->sparepart->name}}</td>
                            <td>{{ $data->qty }}</td>
                            <td class="text-md-end">@currency($data->price)</td>
                            @php $ttl= $data->qty*$data->price @endphp

                            <td class="text-md-end">@currency($ttl)</td>

                            <td>
                                <a
                                    href="/dashboard/stock/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit stock"
                                    ><i class="far fa-edit"></i
                                ></a>
                                |
                                <form
                                    action="/dashboard/stock/{{ $data->slug }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger border-0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete stock"
                                        onclick="return confirm('are You sure ??')"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php $grandtotal = $grandtotal+$ttl; @endphp @endforeach

                        <tr>
                            <td colspan="5">Total</td>
                            <td class="text-md-end">@currency($grandtotal)</td>
                            <td></td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            {{ $datas->links() }}
        </div>
    </div>
</x-admin-layout>
