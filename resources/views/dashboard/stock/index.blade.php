<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        @foreach($datas as $data)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading-{{ $data->id }}">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse{{ $data->id }}"
                    aria-expanded="false"
                    aria-controls="flush-collapse{{ $data->id }}"
                >
                    {{$data->name}}
                </button>
            </h2>
            <div
                id="flush-collapse{{ $data->id }}"
                class="accordion-collapse collapse"
                aria-labelledby="flush-heading{{ $data->id }}"
                data-bs-parent="#accordionFlushExample"
            >
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md">
                            <x-card header="Sparepart Data">
                                <div class="row my-2">
                                    <div class="col-md">
                                        <a
                                            href="/dashboard/stock/sparepart/create"
                                            class="btn btn-primary btn-sm"
                                            >Add Sparepart</a
                                        >
                                    </div>
                                </div>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pic</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">brand</th>
                                            <th scope="col">Code Part</th>
                                            <th scope="col">Qty</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->sparepart->count())
                                        @foreach($data->sparepart as $part)
                                        <tr>
                                            <th scope="row">
                                                {{ $loop->index + 1 }}
                                            </th>
                                            <td>
                                                @if($part->pic)
                                                <img
                                                    width="50"
                                                    src="{{ asset('storage/'. $part->pic) }}"
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
                                                {{ $part->type->brand->name }}
                                                -
                                                {{ $part->type->name }}
                                            </td>
                                            <td>
                                                {{ $part->name }}
                                            </td>
                                            <td>
                                                {{ $part->brand }}
                                            </td>
                                            <td>
                                                {{ $part->codepart }}
                                            </td>
                                            <td>
                                                {{ $part->qty }}
                                            </td>

                                            <td>
                                                <a
                                                    href="/dashboard/stock/sparepart/{{ $part->slug }}/edit"
                                                    class="badge bg-warning"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Edit stock"
                                                    ><i class="far fa-edit"></i
                                                ></a>
                                                |
                                                <form
                                                    action="/dashboard/stock/sparepartpart/{{ $part->slug }}"
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
                                                        <i
                                                            class="fas fa-trash-alt"
                                                        ></i>
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-admin-layout>
