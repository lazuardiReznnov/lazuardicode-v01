<h1 class="mt-4">{{ $title }}</h1>
<ol class="breadcrumb mb-4">
    @if(isset($active))
    <li class="breadcrumb-item active">{{ $name }}</li>
    @else
    <li class="breadcrumb-item">
        {{ $slot }}
    </li>
    @endif
</ol>
