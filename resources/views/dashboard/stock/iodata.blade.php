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
        <div class="col-md-8">
            <x-card header="Billing List">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">invoice</th>
                            <th scope="col">Total Bill</th>

                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if($datas->count()) @foreach($datas as $data)
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>
                            <td>{{ $data->name }}</td>
                            <td>
                                @php $gttl = 0 @endphp @foreach($data->invStock
                                as $inv)
                                <ul>
                                    <li>
                                        <a
                                            href="/dashboard/stock/detail/{{ $inv->slug }}"
                                            class="badge bg-warning"
                                        >
                                            {{ $inv->name }}
                                        </a>
                                        @foreach($inv->stock as $stock) @php
                                        $ttl = $stock->qty * $stock->price;
                                        @endphp @endforeach
                                    </li>
                                </ul>
                                @php $gttl = $ttl +$gttl @endphp @endforeach
                                <!-- @php $gtotal =0; @endphp
                                @foreach($data->invStock as $inv)
                                @foreach($inv->stock as $stock) @php $totalstock
                                = $stock->qty*$stock->price; @endphp @endforeach
                                @php $gtotal = $gtotal+$totalstock; @endphp
                                @endforeach
                                {{ $gtotal }} -->
                            </td>
                            <td>@currency($gttl)</td>
                            <td>Lunas</td>
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
                <div class="row">
                    <div class="col-md-8">
                        {{ $datas->onEachside(2)->links() }}
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-8">
            {{ $datas->links() }}
        </div>
    </div> -->
</x-admin-layout>
