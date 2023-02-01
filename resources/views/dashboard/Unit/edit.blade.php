<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Management
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Portofolio">
                <form
                    action="/dashboard/unit/{{ $unit->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')

                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >

                        <div class="col-md-6">
                            @if($unit->pic)
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $unit->pic }}"
                            />
                            <img
                                src="{{ asset('storage/'. $unit->pic) }}"
                                class="d-block img-fluid mb-2 col-sm-5"
                            />
                            @else
                            <img class="img-preview img-fluid mb-2 col-sm-5" />
                            @endif

                            <input
                                id="pic"
                                type="file"
                                class="form-control @error('pic') is-invalid @enderror"
                                name="pic"
                                value="{{ old('pic') }}"
                                onchange="previewImage()"
                                autocomplete="pic"
                                autofocus
                            />

                            @error('pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="name"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Registration Number") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name',$unit->name) }}"
                                required
                                autocomplete="name"
                                autofocus
                            />

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="slug"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Slug") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="slug"
                                type="text"
                                class="form-control @error('slug') is-invalid @enderror"
                                name="slug"
                                value="{{ old('slug',$unit->slug) }}"
                                required
                                autocomplete="slug"
                                autofocus
                            />

                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="group"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("group") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('group_id') is-invalid @enderror"
                                id="group"
                                aria-label="group"
                                name="group_id"
                            >
                                <option selected>Select group</option>
                                @foreach($groups as $group)
                                @if(old('group_id',$unit->group_id)==$group->id)
                                <option value="{{ $group->id }}" selected>
                                    {{ $group->name }}
                                </option>
                                @else
                                <option value="{{ $group->id }}">
                                    {{ $group->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="flag_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Flag") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('flag_id') is-invalid @enderror"
                                id="flag"
                                aria-label="flag_id"
                                name="flag_id"
                            >
                                <option selected>Select flag</option>
                                @foreach($flags as $flag)
                                @if(old('flag_id',$unit->flag_id)==$flag->id)
                                <option value="{{ $flag->id }}" selected>
                                    {{ $flag->name }}
                                </option>
                                @else
                                <option value="{{ $flag->id }}">
                                    {{ $flag->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('flag_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="carosery_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("carosery") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('carosery_id') is-invalid @enderror"
                                id="carosery"
                                aria-label="carosery_id"
                                name="carosery_id"
                            >
                                <option selected>Select carosery</option>
                                @foreach($caroseries as $carosery)
                                @if(old('carosery_id',
                                $unit->carosery_id)==$carosery->id)
                                <option value="{{ $carosery->id }}" selected>
                                    {{ $carosery->name }}
                                </option>
                                @else
                                <option value="{{ $carosery->id }}">
                                    {{ $carosery->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('carosery_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="category_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Category") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('category_id') is-invalid @enderror"
                                id="category"
                                aria-label="category_id"
                                name="category_id"
                            >
                                <option selected>Select Category</option>
                                @foreach($categories as $category)
                                @if(old('category_id',$unit->type->category_id)==$category->id)
                                <option value="{{ $category->id }}" selected>
                                    {{ $category->name }}
                                </option>
                                @else
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="brand"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Brand") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('brand_id') is-invalid @enderror"
                                id="brand"
                                aria-label="brand"
                                name="brand_id"
                            >
                                <option selected>Select Brand</option>
                                @foreach($brands as $brand) @if(old('brand_id',
                                $unit->type->brand_id)==$brand->id)
                                <option value="{{ $brand->id }}" selected>
                                    {{ $brand->name }}
                                </option>
                                @else
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('brand_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="type_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Type") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select"
                                aria-label="type_id"
                                id="type"
                                name="type_id"
                            >
                                @if(old('type_id',$unit->type_id)==
                                $unit->type_id)
                                <option value="{{ $unit->type_id }}" selected>
                                    {{ $unit->type->name }}
                                </option>
                                @endif
                            </select>

                            @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="color"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Color") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="color"
                                type="text"
                                class="form-control @error('color') is-invalid @enderror"
                                name="color"
                                value="{{ old('color',$unit->color) }}"
                                required
                                autocomplete="color"
                                autofocus
                            />
                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="vin"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Vin") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="vin"
                                type="text"
                                class="form-control @error('vin') is-invalid @enderror"
                                name="vin"
                                value="{{ old('vin', $unit->vin) }}"
                                required
                                autocomplete="vin"
                                autofocus
                            />
                            @error('vin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="engine_numb"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Engine number") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="engine_numb"
                                type="text"
                                class="form-control @error('engine_numb') is-invalid @enderror"
                                name="engine_numb"
                                value="{{ old('engine_numb',$unit->engine_numb) }}"
                                required
                                autocomplete="engine_numb"
                                autofocus
                            />
                            @error('engine_numb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="fuel"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Fuel") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="fuel"
                                type="text"
                                class="form-control @error('fuel') is-invalid @enderror"
                                name="fuel"
                                value="{{ old('fuel',$unit->fuel) }}"
                                required
                                autocomplete="fuel"
                                autofocus
                            />
                            @error('fuel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="cylinder"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("cylinder") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="cylinder"
                                type="text"
                                class="form-control @error('cylinder') is-invalid @enderror"
                                name="cylinder"
                                value="{{ old('cylinder',$unit->cylinder) }}"
                                required
                                autocomplete="cylinder"
                                autofocus
                            />
                            @error('cylinder')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="year"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("year") }}</label
                        >

                        <div class="col-md-6">
                            @php $now = date('Y'); @endphp
                            <select name="year" class="form-select">
                                <option selected>--Choice Year--</option>
                                @for ($a=2012;$a<=$now;$a++)
                                @if(old($a,$unit->year)==$a)
                                <option value="{{ $a }}" selected>
                                    {{ $a }}
                                </option>
                                @else
                                <option value="{{ $a }}">
                                    {{ $a }}
                                </option>
                                @endif @endfor
                            </select>
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 ms-1">
                        <div class="col-md text-md-end">
                            <button
                                class="btn btn-primary"
                                type="submit"
                                name="save"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
    @push('script2')

    <script>
        //  slug alternatif`

        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");
        const link = "/dashboard/unit/checkSlug?name=";

        makeslug(name, slug, link);

        const brand = document.querySelector("#brand");
        const category = document.querySelector("#category");
        const type = document.querySelector("#type");
        const link2 = "/dashboard/unit/getType?brand=";

        makeBrand(brand, type, link2);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>
    <script src="/asset/js/trix.js"></script>
    @endpush @push('css')
    <link rel="stylesheet" href="/asset/css/trix.css" />
    @endpush
</x-admin-layout>
