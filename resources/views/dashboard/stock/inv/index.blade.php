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
        <div class="col-md">
            <x-card header="{{ $name }} Store">
                <div class="row my-2">
                    <div class="col-md">
                        <a
                            href="/dashboard/stock/invStock/create/{{ $data }}"
                            class="btn btn-primary btn-sm"
                            >Add Item</a
                        >
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Store</th>
                            <th scope="col">Payment</th>
                            <th scope="col " class="text-md-center">Sum</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($datas->count()) @foreach($datas as $data)
                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>
                            <td>
                                @if($data->pic)
                                <img
                                    width="50"
                                    src="{{ asset('storage/'. $data->pic) }}"
                                    class="rounded-circle mx-auto d-block shadow my-3"
                                    alt="Unit Image"
                                />
                                @else
                                <img
                                    class="rounded-circle mx-auto d-block shadow my-3"
                                    src="http://source.unsplash.com/200x200?truck"
                                    alt=""
                                    width="50"
                                />
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d/m/Y') }}
                            </td>
                            <td>
                                <a
                                    href="/dashboard/stock/detail/{{ $data->slug }}"
                                    >{{ $data->name }}</a
                                >
                            </td>
                            <td>{{ $data->supplier->name }}</td>
                            <td>{{ $data->payment }}</td>
                            <?php
                            $gttl = 0;
                           ?>
                            @foreach($data->stock as $stock)
                            <?php 
                                        $ttl = $stock->qty * $stock->price;
                            $gttl = $gttl+$ttl; ?> @endforeach
                            <td class="text-md-end">@currency($gttl)</td>

                            <td>
                                <a
                                    href="/dashboard/stock/invStock/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit stock"
                                    ><i class="far fa-edit"></i
                                ></a>
                                |
                                <form
                                    action="/dashboard/stock/invStock/{{ $data->slug }}"
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
                        @endforeach @else
                        <tr>
                            <td colspan="4" class="text-center">
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
