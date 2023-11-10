<div>
    <form wire:submit.prevent="submit" class="p-4 mx-auto max-w-md space-y-4">
        <div class="form-group">
            <label for="firstName">First Name
                <input wire:model="firstName" type="text" class="form-control" id="firstName" placeholder="First Name">
                @error('firstName') <span class="error">{{ $message }}</span> @enderror
            </label>
            <label for="lastName">Last Name
                <input wire:model="lastName" type="text" class="form-control" id="lastName" placeholder="Last Name">
                @error('lastName') <span class="error">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="form-group">
            <label for="npiNumber">NPI Number
            <input wire:model="npiNumber" type="text" class="form-control" id="npiNumber" placeholder="NPI Number">
            @error('lastName') <span class="error">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="form-group">
            <label for="taxonomyDescription">Taxonomy Description
                <input wire:model="taxonomyDescription" type="text" class="form-control" id="taxonomyDescription" placeholder="Taxonomy Description">
                @error('taxonomyDescription') <span class="error">{{ $message }}</span> @enderror
            </label>
        </div>

        <div class="form-group">
            <label for="city">City
                <input wire:model="city" type="text" class="form-control" id="city" placeholder="City">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </label>

            <label for="state">State
                <input wire:model="state" type="text" class="form-control" id="state" placeholder="State">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </label>

            <label for="zip">ZIP
                <input wire:model="zip" type="text" class="form-control" id="zip" placeholder="ZIP">
                @error('zip') <span class="error">{{ $message }}</span> @enderror
            </label>
        </div>
        <br \>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" wire:confirm="Are you sure you want to delete this post?">Search</button>
        </div>

        <div wire:loading wire:target="results">Fetching data...</div>
    </form>
</div>

