<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>
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
                                    <td>{{ $data1->supplier->name }}</td>
                                    <td>{{ $data1->name }}</td>
                                    @foreach($data1->stock as $stock1) @php $ttl
                                    = $stock1->qty*$stock1->price; @endphp
                                    @endforeach
                                    <td>@currency($ttl)</td>
                                    <td>{{ $data1->payment }}</td>
                                </tr>
                                @php $gttl = $ttl+$gttl; @endphp @endforeach
                                <tr class="fw-bold">
                                    <td colspan="3">grandtotal</td>
                                    <td colspan="3">@currency($gttl)</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">
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
                                    <td>{{ $data2->supplier->name }}</td>
                                    <td>{{ $data2->name }}</td>
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
                                    <td colspan="4" class="text-center">
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
                        <p>
                            Total Tagihan Bulan {{ date("F") }} :
                            @currency($gttl+$gttl2)
                        </p>
                        <p>Total Tagihan Terbayar @currency($gttl2)</p>
                        <p>Total Tagihan Blm Terbayar @currency($gttl)</p>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
