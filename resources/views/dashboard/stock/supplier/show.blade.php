<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Detail Unit : {{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Mangement
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/supplier">
            Supplier Mangement
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
    <div class="row">
        <div class="col-md">
            <x-card>
                <div class="row justify-content-between mb-5">
                    <div class="col-md-6">
                        <a
                            href="/dashboard/stock/supplier/image/{{ $data->slug }}"
                            class="btn btn-primary mb-3"
                            >Add Image</a
                        >
                        @if($data->image)
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card mb-3 shadow d-flex">
                                    <img
                                        width="200"
                                        src="{{ asset('storage/'. $data->image->pic) }}"
                                        class="my-3 d-block mx-auto"
                                        alt="about Image"
                                    />
                                    <form
                                        action="/dashboard/stock/supplier/image/{{ $data->slug }}"
                                        method="post"
                                        class="d-inline"
                                    >
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $data->image->id }}"
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
                        </div>

                        @else
                        <img
                            class="rounded-circle mx-auto d-block shadow my-3"
                            src="http://source.unsplash.com/200x200?truck"
                            alt=""
                            width="250"
                        />
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div
                            class="accordion accordion-flush"
                            id="accordionFlushExample"
                        >
                            <div class="accordion-item">
                                <h2
                                    class="accordion-header"
                                    id="flush-headingOne"
                                >
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseOne"
                                    >
                                        Detail Descriptions
                                    </button>
                                </h2>
                                <div
                                    id="flush-collapseOne"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Name</b><br />
                                                {{ $data->name }}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address</b><br />
                                                {{ $data->address }}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone</b><br />
                                                {{ $data->phone }}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email</b><br />
                                                {{ $data->email }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2
                                    class="accordion-header"
                                    id="flush-headingTwo"
                                >
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseTwo"
                                    >
                                        Letter
                                    </button>
                                </h2>
                                <div
                                    id="flush-collapseTwo"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo"
                                    data-bs-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body"></div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2
                                    class="accordion-header"
                                    id="flush-headingThree"
                                >
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseThree"
                                    >
                                        File
                                    </button>
                                </h2>
                                <div
                                    id="flush-collapseThree"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree"
                                    data-bs-parent="#accordionFlushExample"
                                >
                                    <div class="accordion-body">
                                        Placeholder content for this accordion,
                                        which is intended to demonstrate the
                                        <code>.accordion-flush</code> class.
                                        This is the third item's accordion body.
                                        Nothing more exciting happening here in
                                        terms of content, but just filling up
                                        the space to make it look, at least at
                                        first glance, a bit more representative
                                        of how this would look in a real-world
                                        application.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
