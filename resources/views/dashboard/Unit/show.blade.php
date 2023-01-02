<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Mangement
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md">
            <x-card>
                <div class="row justify-content-between mb-5">
                    <div class="col-md-6">
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
                                        spesification
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
                                        <div class="row">
                                            @foreach($data->Letter as $let)
                                            <div class="col-md">
                                                <ul class="list-group">
                                                    <li
                                                        class="list-group-item active text-uppercase"
                                                        aria-current="true"
                                                    >
                                                        {{ $let->categoryletter->name }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Registration No.</b
                                                        ><br />{{ $let->regNum }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Owner</b
                                                        ><br />{{ $let->owner }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Registration Year</b
                                                        ><br />
                                                        {{ $let->reg_year }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Location Code</b
                                                        ><br />{{ $let->loc_code }}
                                                    </li>
                                                    @if($let->tax != 0)
                                                    <li class="list-group-item">
                                                        @php $date_now =
                                                        date("Y/m/d"); @endphp

                                                        <b>Tax</b><br /><span
                                                            class="text-{{ \Lazuardicode::expire($let->tax,$date_now) }}"
                                                        >
                                                            {{ $let->tax }}</span
                                                        >
                                                    </li>
                                                    @endif
                                                    <li class="list-group-item">
                                                        <b>expire date</b><br />
                                                        <span
                                                            class="text-{{ \Lazuardicode::expire($let->expire_date,$date_now) }}"
                                                        >
                                                            {{ $let->expire_date }}</span
                                                        >
                                                    </li>
                                                </ul>
                                            </div>

                                            @endforeach
                                        </div>
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
