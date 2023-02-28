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
        <div class="col-md">
            <x-card>
                <div class="row justify-content-between mb-5">
                    <div class="col-md-4">
                        <div class="card">
                            @if($data->pic)
                            <img
                                width="200"
                                src="{{ asset('storage/'. $data->pic) }}"
                                class="rounded-circle mx-auto d-block shadow my-3"
                                alt="about Image"
                            />
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
                                        Detail
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
                                    <div class="accordion-body">
                                        <div class="row"></div>
                                    </div>
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
