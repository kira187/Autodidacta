<div class="p-6 sm:px-20 bg-whiye border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Items
    </div>

    <div class="mt-6">
        {{--  <div class="mt-3 mb-4 flex flex-col sm:flex-row">
            <div class="flex">
                <div class="relative">                    
                    <select class="h-full  rounded-l rounded-r border sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        <option>All</option>
                        <option wire:click="active">Active</option>
                        <option>Inactive</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="block relative mt-2 sm:mt-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                    </svg>
                </span>

                <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
            </div>
        </div>  --}}

        @if (session()->has('message'))
            <div class="bg-green-100 p-5 w-full rounded relative" x-data="{show: true}" x-show="show">
                <div class="flex justify-between">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-500 h-4 w-4">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z" /></svg>
                        <div class="flex-1 leading-tight text-sm text-green-700 font-medium">{{ session('message')}}</div>
                    </div>
                    <span @click="show = false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-600 h-3 w-3"> 
                            <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        <div class="mr-2">
            <x-jet-button wire:click="confirmItemAdd" class="bg-blue-500 hover:bg-blue-700">
                Add New Item
            </x-jet-button>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div class="">
                <input wire:model.debounce.500ms="q" type="search" placeholder="Search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mr-2">
                <input type="checkbox" class="mr-2 leading-tight" wire:model="active" />Active Only?
            </div>
        </div>
        
         <table class="table-auto w-full">
             <thead>
                 <th class="px-4 py-2">
                    <div class="flex items-center">
                        <button  class="cursor-pointer focus:outline-none" wire:click="sortBy('id')">ID</button>
                        <x-sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                 </th>
                 <th class="px-4 py-2">
                    <div class="flex items-center">
                        <button class="cursor-pointer focus:outline-none" wire:click="sortBy('name')">Name</button>
                        <x-sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                 </th>
                 <th class="px-4 py-2">
                    <div class="flex items-center">
                        <button class="cursor-pointer focus:outline-none" wire:click="sortBy('price')">Price</button>
                        <x-sort-icon sortField="price" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                 </th>
                 <th class="px-4 py-2">
                    Status
                 </th>
                 <th class="px-4 py-2">
                    Actions
                 </th>                 
             </thead>
             <tbody>
                 @forelse ($items as $item)
                     <tr>
                         <td class="border px-4 py-2"  width="10px">{{$item->id}}</td>
                         <td class="border px-4 py-2">{{$item->name}}</td>
                         <td class="border px-4 py-2">{{ number_format($item->price, 2)}}</td>
                         <td class="border px-4 py-2">{{$item->status? 'Active' : 'No active'}}</td>
                         <td class="border px-4 py-2" width="100px">
                            <button class="p-1 focus:outline-none text-teal-500 hover:text-teal-600" wire:click="confirmItemEdit({{ $item->id }})">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                  </svg>
                            </button>
                            
                            <button class="cursor-pointer p-1 focus:outline-none text-red-500 hover:text-red-600" wire:click="confirmItemDeletion({{ $item->id }})">
                                <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                     </tr>
                 @empty
                    <tr>
                        <td class="border px-4 py-2" colspan="5">Sin datos por listar</td>
                    </tr>
                 @endforelse
             </tbody>
         </table>
    </div>

    <div class="mt-4">
        {{$items->links()}}
    </div>

    <x-jet-confirmation-modal wire:model="confirmItemDeletion">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your item? ') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmItemDeletion }})" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    
    <x-jet-dialog-modal wire:model="confirmItemAdd">
        <x-slot name="title">
            {{ isset($this->item->id) ? 'Edit item' : 'Add Item'}}
        </x-slot>
            
        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="item.name" />
                <x-jet-input-error for="item.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-jet-label for="name" value="{{ __('Price') }}" />
                <x-jet-input id="name" type="number" class="mt-1 block w-full" wire:model.defer="item.price" />
                <x-jet-input-error for="item.price" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-4">
                <label for="flex item-center">
                    <input type="checkbox" wire:model.defer="item.status" class="form-checkbox">
                    <span class="ml-2 text-sm text-gray-600">Active</span>
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmItemAdd', false)" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="saveItem({{ $confirmItemDeletion }})" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
   
</div>