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

    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Pilih Bulan</h5>
            <form action="/dashboard/stock/iodata">
                <div class="input-group mb-3">
                    <input
                        type="month"
                        class="form-control"
                        placeholder="Month"
                        aria-label="Month"
                        aria-describedby="save"
                        name="month"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="submit"
                        id="save"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="dropdown">
                <button
                    class="btn btn-dark dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Add New Invoice
                </button>
                <ul class="dropdown-menu">
                    @foreach($datas3 as $sup)
                    <li>
                        <a
                            class="dropdown-item"
                            href="/dashboard/stock/invStock/{{ $sup->slug }}"
                            >{{ $sup->name }}</a
                        >
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <x-card header=" Billing">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button
                            class="nav-link active"
                            id="nav-Unpaid-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-Unpaid"
                            type="button"
                            role="tab"
                            aria-controls="nav-Unpaid"
                            aria-selected="true"
                        >
                            Unpaid
                        </button>
                        <button
                            class="nav-link"
                            id="nav-Paid-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-Paid"
                            type="button"
                            role="tab"
                            aria-controls="nav-Paid"
                            aria-selected="false"
                        >
                            Paid
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="nav-Unpaid"
                        role="tabpanel"
                        aria-labelledby="nav-Unpaid-tab"
                        tabindex="0"
                    >
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Invoice/Amount</th>

                                    <th scope="col">Total Bill</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $ttl = 0; $gttl=0; @endphp
                                @if($datas1->count())
                                <tr>
                                    @foreach($datas1 as $data1)
                                    <th scope="row">
                                        {{ ($datas1->currentpage()-1) * $datas1->perpage() + $loop->index + 1 }}
                                    </th>
                                    <td>
                                        <a
                                            href="/dashboard/stock/invStock/{{ $data1->supplier->slug }}"
                                            class="text-decoration-none"
                                        >
                                            {{ $data1->supplier->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="/dashboard/stock/detail/{{ $data1->slug }}"
                                            class="text-decoration-none"
                                        >
                                            {{ $data1->name }}</a
                                        >
                                    </td>
                                    @foreach($data1->stock as $stock1) @php $ttl
                                    = $stock1->qty*$stock1->price; @endphp
                                    @endforeach
                                    <td>@currency($ttl)</td>
                                    <td>{{ $data1->payment }}</td>
                                    <td>
                                        <form
                                            action="/dashboard/stock/pay/{{ $data1->slug }}"
                                            method="post"
                                            class="d-inline"
                                        >
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="month"
                                                value="{{ $month }}"
                                            />
                                            <button
                                                class="badge bg-success border-0"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Paid Inv stock"
                                                onclick="return confirm('are You sure ??')"
                                            >
                                                <i
                                                    class="bi bi-credit-card"
                                                ></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php $gttl = $ttl+$gttl; @endphp @endforeach
                                <tr class="fw-bold">
                                    <td colspan="3">grandtotal</td>
                                    <td colspan="3">@currency($gttl)</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data Not Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8">
                                {{ $datas1->onEachside(2)->links() }}
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="nav-Paid"
                        role="tabpanel"
                        aria-labelledby="nav-Paid-tab"
                        tabindex="0"
                    >
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Invoice/Amount</th>

                                    <th scope="col">Total Bill</th>
                                    <th scope="col">Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $ttl = 0; $gttl2=0; @endphp
                                @if($datas2->count())
                                <tr>
                                    @foreach($datas2 as $data2)
                                    <th scope="row">
                                        {{ ($datas2->currentpage()-1) * $datas2->perpage() + $loop->index + 1 }}
                                    </th>
                                    <td>
                                        <a
                                            href="/dashboard/stock/invStock/{{ $data2->supplier->slug }}"
                                            class="text-decoration-none"
                                        >
                                            {{ $data2->supplier->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="/dashboard/stock/detail/{{ $data2->slug }}"
                                            class="text-decoration-none"
                                        >
                                            {{ $data2->name }}
                                        </a>
                                    </td>
                                    @foreach($data2->stock as $stock2) @php $ttl
                                    = $stock2->qty*$stock2->price; @endphp
                                    @endforeach
                                    <td>@currency($ttl)</td>
                                    <td>{{ $data2->payment }}</td>
                                </tr>
                                @php $gttl2 = $ttl+$gttl2; @endphp @endforeach
                                <tr class="fw-bold">
                                    <td colspan="3">grandtotal</td>
                                    <td colspan="3">@currency($gttl2)</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data Not Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8">
                                {{ $datas2->onEachside(2)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Total Paid Billing : @currency($gttl2)
                            </li>
                            <li class="list-group-item">
                                Total Unpaid Billing : @currency($gttl)
                            </li>
                            <li class="list-group-item">
                                Billing Total Month {{ date("F") }} :
                                @currency($gttl+$gttl2)
                            </li>
                        </ul>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
