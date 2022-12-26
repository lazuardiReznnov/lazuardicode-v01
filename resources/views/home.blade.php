<x-landingpage-layout title="{{ $title }}">
    <x-herolandingpage>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 align-content-center">
                    @if($hero->pic)
                    <img
                        width="300"
                        src="{{ asset('storage/'. $hero->pic) }}"
                        class="rounded-circle mx-auto d-block shadow my-3 border d"
                        alt="Unit Image"
                    />
                    @else
                    <img
                        class="rounded-circle mx-auto border d-block shadow-lg"
                        src="http://source.unsplash.com/200x200?truck"
                        alt=""
                        width="200"
                    />
                    @endif
                </div>
                <div class="col-md-6 text-start align-content-center">
                    <h2 class="text-light text-shadow-lg">
                        {!! $hero->heading !!}
                    </h2>
                    <p class="text-blue-100">{{ $hero->title }}</p>
                    <div class="text-blue-100 mb-3">
                        {!! $hero->descriptions !!}
                    </div>

                    <button class="btn btn-primary">Enter</button>
                </div>
            </div>
        </div>
    </x-herolandingpage>
    <div class="mb-5">
        <h1 class="text-center mb-3 text-blue-800 text-shadow">
            {{$about->title}}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p>{!! $about->desc1 !!}</p>
            </div>
            <div class="col-md-5">
                <p>{!! $about->desc2 !!}</p>
            </div>
        </div>
    </div>

    <div class="bg-blue-900 rounded p-3">
        <h1 class="text-blue-100 text-shadow text-center mb-4">Portofolio</h1>
        <div class="row">
            @foreach($portos as $porto)
            <div class="col-md-4 mb-2">
                <div class="card">
                    @if($porto->pic)
                    <img
                        width="200"
                        src="{{ asset('storage/'. $porto->pic) }}"
                        class="rounded-circle mx-auto d-block shadow my-3"
                        alt="Unit Image"
                    />
                    @else
                    <img
                        src="http://source.unsplash.com/200x200?truck"
                        alt=""
                    />
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $porto->name }}
                        </h5>
                        <p class="card-text">
                            {{$porto->sbody}}
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="p-3 mb-3">
        <h1 class="text-center">Contac Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Form Contac</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label
                                for="exampleFormControlInput1"
                                class="form-label"
                                >Email address</label
                            >
                            <input
                                type="email"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="name@example.com"
                            />
                        </div>
                        <div class="mb-3">
                            <label
                                for="exampleFormControlTextarea1"
                                class="form-label"
                                >Example textarea</label
                            >
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landingpage-layout>
