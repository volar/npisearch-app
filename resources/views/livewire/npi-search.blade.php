<div class="container my-4">
    <div class="row">
        <div class="col-md-3">
            {{-- Livewire Search Form Component --}}
            @livewire('npi-search-form')
        </div>
        <div class="col-md-9">
            {{-- Livewire Search Results Component --}}
            @livewire('search-results')
        </div>
    </div>
</div>