<div class="bg-white p-8 rounded shadow-md">

  <form wire:submit.prevent="submit" class="space-y-6">
    <div>
      
      <div class="flex space-x-2">
        <label for="firstName" class="block font-medium">First Name</label>
        <input wire:model="firstName" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" enter">
        <label for="lastName" class="block font-medium">Last Name</label>
        <input wire:model="lastName" class="" type="text" placeholder=" enter">
      </div>
    </div>

    <div class="flex space-x-2">
        <label for="npiNumber" class="block font-medium">NPI Number</label>
        <input wire:model="npiNumber" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" number">
        <label for="taxonomyDescription" class="block font-medium">Taxonomy Description</label>
        <input wire:model="taxonomyDescription" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" not required">
    </div>

    <div class="flex space-x-3">
      <label for="city">City</label>
      <input wire:model="city" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" NY">
      <label for="state">State</label>
      <input wire:model="state" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" NY">
      <label for="zip">Zip</label>
      <input wire:model="zip" class="flex-1 border border-gray-400 p-2 rounded" type="text" placeholder=" xxxxx">  
    </div>
    <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
      Search
    </button>
    <div wire:loading wire:target="results" class="text-gray-600 button">
      Fetching data...
    </div>

  </form>
</div>