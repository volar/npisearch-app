<div class="container my-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">
            {{-- Livewire Search Form Component --}}
            @livewire('npi-search-form', ['query' => $query])
        </div>
        <div class="col-md-9">
            {{-- Livewire Search Results Component --}}
            @livewire('search-results', ['data' => $data])
        </div>
    </div>
</div>