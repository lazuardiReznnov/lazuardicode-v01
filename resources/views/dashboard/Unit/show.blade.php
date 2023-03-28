<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Detail Unit : {{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Mangement
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <!-- Pesan -->
    <div class="row">
        <div class="col-md-10">
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
    <!-- endPesan -->

    <div class="row justify-content-between mb-5">
        <div class="col-md-4">
            <x-card>
                <a
                    href="/dashboard/unit/image/{{ $data->slug }}"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Upload Image"
                    class="btn btn-primary mb-3"
                    ><i class="bi bi-upload"></i
                ></a>
                @if($data->image->count())
                <div class="row">
                    @foreach($data->image as $pic)
                    <div class="col-sm-6">
                        <div class="card mb-3 shadow d-flex">
                            <img
                                width="200"
                                src="{{ asset('storage/'. $pic->pic) }}"
                                class="my-3 d-block mx-auto"
                                alt="{{ $pic->name }}"
                            />
                            <p class="text-center fw-bold">
                                {{ $pic->name }}
                            </p>
                            <form
                                action="/dashboard/unit/image/{{ $data->slug }}"
                                method="post"
                                class="d-inline"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="{{ $pic->id }}"
                                />
                                @method('delete') @csrf
                                <button
                                    class="badge bg-danger"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Delete Image Unit"
                                    onclick="return confirm('are You sure ??')"
                                >
                                    <i class="bi bi-file-x-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                <img
                    class="rounded-circle mx-auto d-block shadow my-3"
                    src="http://source.unsplash.com/200x200?truck"
                    alt=""
                    width="250"
                />
                @endif
            </x-card>
        </div>
        <div class="col-md-8">
            <x-card>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button
                            class="nav-link active"
                            id="nav-spesification-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-spesification"
                            type="button"
                            role="tab"
                            aria-controls="nav-spesification"
                            aria-selected="true"
                        >
                            Spesification
                        </button>
                        <button
                            class="nav-link"
                            id="nav-letter-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-letter"
                            type="button"
                            role="tab"
                            aria-controls="nav-letter"
                            aria-selected="false"
                        >
                            Letter
                        </button>
                        <button
                            class="nav-link"
                            id="nav-contact-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-contact"
                            type="button"
                            role="tab"
                            aria-controls="nav-contact"
                            aria-selected="false"
                        >
                            Contact
                        </button>
                        <button
                            class="nav-link"
                            id="nav-disabled-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-disabled"
                            type="button"
                            role="tab"
                            aria-controls="nav-disabled"
                            aria-selected="false"
                            disabled
                        >
                            Disabled
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="nav-spesification"
                        role="tabpanel"
                        aria-labelledby="nav-spesification-tab"
                        tabindex="0"
                    >
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Registration number</b><br />
                                {{ $data->name }}
                            </li>

                            <li class="list-group-item">
                                <b>Category</b><br />
                                {{ $data->type->category->name }}
                            </li>
                            <li class="list-group-item">
                                <b>Brand/Model/Type</b><br />
                                {{ $data->type->brand->name }}
                                {{ $data->type->name }}
                            </li>
                            <li class="list-group-item">
                                <b>Vin</b><br />
                                {{ $data->vin}}
                            </li>
                            <li class="list-group-item">
                                <b>Engine Number</b><br />
                                {{ $data->engine_numb}}
                            </li>
                            <li class="list-group-item">
                                <b>Color</b><br />
                                {{ $data->color}}
                            </li>
                            <li class="list-group-item">
                                <b>Year</b><br />
                                {{ $data->year}}
                            </li>
                            <li class="list-group-item">
                                <b>Flag</b><br />
                                {{ $data->flag->name }}
                            </li>
                            <li class="list-group-item">
                                <b>Group</b><br />
                                {{ $data->group->name }}
                            </li>
                        </ul>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="nav-letter"
                        role="tabpanel"
                        aria-labelledby="nav-letter-tab"
                        tabindex="0"
                    >
                        @php $date_now = date("Y/m/d"); @endphp
                        @foreach($data->letter as $letter)
                        <ul class="list-group my-3">
                            <li
                                class="list-group-item active"
                                aria-current="true"
                            >
                                {{ $letter->categoryLetter->name }}
                            </li>
                            <li class="list-group-item">
                                <b>ID</b><br />{{ $letter->regNum }}
                            </li>
                            <li class="list-group-item">
                                <b>Owner</b><br />{{ $letter->owner }}
                            </li>
                            <li class="list-group-item">
                                <b>Address</b><br />{{ $letter->owner_add }}
                            </li>
                            <li class="list-group-item">
                                <b>Year</b><br />{{ $letter->reg_year }}
                            </li>
                            <li class="list-group-item">
                                <b>Location Code</b
                                ><br />{{ $letter->loc_code }}
                            </li>
                            @if($letter->lpc)
                            <li class="list-group-item">
                                <b>Licence Plate Color</b
                                ><br />{{ $letter->lpc }}
                            </li>
                            @endif @if($letter->vodn)
                            <li class="list-group-item">
                                <b>Vehicle Ownwership Document</b
                                ><br />{{ $letter->vodn }}
                            </li>
                            @endif @if($letter->tax)
                            <li class="list-group-item">
                                <b>Tax</b><br /><span
                                    class="text-{{ \Lazuardicode::expire($data->tax,$date_now) }}"
                                >
                                    {{ \Carbon\Carbon::parse($data->tax)->format('d/m/Y') }}
                                </span>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <b>Expire Date</b><br />
                                <span
                                    class="text-{{ \Lazuardicode::expire($data->expire_date,$date_now) }}"
                                >
                                    {{ \Carbon\Carbon::parse($data->expire_date)->format('d/m/Y') }}
                                </span>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div
                        class="tab-pane fade"
                        id="nav-contact"
                        role="tabpanel"
                        aria-labelledby="nav-contact-tab"
                        tabindex="0"
                    >
                        ...
                    </div>
                    <div
                        class="tab-pane fade"
                        id="nav-disabled"
                        role="tabpanel"
                        aria-labelledby="nav-disabled-tab"
                        tabindex="0"
                    >
                        ...
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
