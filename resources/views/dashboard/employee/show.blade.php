<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/employee">
            employee
        </x-breadcrumb-link>
        <x-breadcrumb-link
            link="/dashboard/employee/detail/{{ $data->department->slug }}"
        >
            List employee
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

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

    <div class="btn-group mb-3">
        <a
            href="/dashboard/employee/image/{{ $data->slug }}"
            class="btn btn-primary"
            ><i class="bi bi-upload"></i
        ></a>
        <a
            href="/dashboard/employee/{{ $data->slug }}/edit"
            class="btn btn-warning"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Edit employee"
            ><i class="bi bi-pencil-square"></i
        ></a>

        <form
            action="/dashboard/employee/{{ $data->slug }}"
            method="post"
            class="d-inline"
        >
            @method('delete') @csrf
            <button
                class="btn btn-danger"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Delete employee"
                onclick="return confirm('are You sure ??')"
            >
                <i class="bi bi-file-x-fill"></i>
            </button>
        </form>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="row justify-content-between mb-5">
                <div class="col-md-4">
                    <div class="card">
                        @if($data->image)
                        <img
                            width="200"
                            src="{{ asset('storage/'. $data->image->pic) }}"
                            class="rounded-circle mx-auto d-block shadow my-3"
                            alt="about Image"
                        />
                        <form
                            action="/dashboard/employee/image/{{ $data->slug }}"
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
                                title="Delete Image Employee"
                                onclick="return confirm('are You sure ??')"
                            >
                                <i class="bi bi-file-x-fill"></i>
                            </button>
                        </form>
                        @else
                        <img
                            class="rounded-circle mx-auto d-block shadow my-3"
                            src="http://source.unsplash.com/200x200?truck"
                            alt=""
                            width="250"
                        />
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <x-card>
                        <nav>
                            <div
                                class="nav nav-tabs"
                                id="nav-tab"
                                role="tablist"
                            >
                                <button
                                    class="nav-link active"
                                    id="nav-profile-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-profile"
                                    aria-selected="false"
                                >
                                    Profile
                                </button>
                                <button
                                    class="nav-link"
                                    id="nav-file-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-file"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-file"
                                    aria-selected="false"
                                >
                                    File
                                </button>
                                <button
                                    class="nav-link"
                                    id="nav-sallary-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-sallary"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-sallary"
                                    aria-selected="false"
                                >
                                    Sallary
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div
                                class="tab-pane show active"
                                id="nav-profile"
                                role="tabpanel"
                                aria-labelledby="nav-profile-tab"
                                tabindex="0"
                            >
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>Full Name</b><br />
                                        {{ $data->name }}
                                    </li>

                                    <li class="list-group-item">
                                        <b>Department</b><br />
                                        {{ $data->department->name }}
                                    </li>
                                    <li class="list-group-item">
                                        <b>Position</b><br />
                                        {{ $data->position->name }}
                                    </li>
                                    <li class="list-group-item">
                                        <b>Id Card</b><br />
                                        {{ $data->idCard}}
                                    </li>
                                    <li class="list-group-item">
                                        <b>E-Mail</b><br />
                                        {{ $data->email}}
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b><br />
                                        {{ $data->phone}}
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b><br />
                                        {{ $data->address}}
                                    </li>
                                    <li class="list-group-item">
                                        <b>Joint Date</b><br />
                                        {{ \Carbon\Carbon::parse($data->tgl)->format('d F Y') }}
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="nav-file"
                                role="tabpanel"
                                aria-labelledby="nav-file-tab"
                                tabindex="0"
                            >
                                ...
                            </div>
                            <div
                                class="tab-pane fade"
                                id="nav-sallary"
                                role="tabpanel"
                                aria-labelledby="nav-sallary-tab"
                                tabindex="0"
                            >
                                ...
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
