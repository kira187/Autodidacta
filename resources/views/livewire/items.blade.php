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
                    <div class="flex items-center">ID</div>
                 </th>
                 <th class="px-4 py-2">
                    <div class="flex items-center">Name</div>
                 </th>
                 <th class="px-4 py-2">
                    <div class="flex items-center">Price</div>
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
                         <td class="border px-4 py-2">{{$item->id}}</td>
                         <td class="border px-4 py-2">{{$item->name}}</td>
                         <td class="border px-4 py-2">{{ number_format($item->price, 2)}}</td>
                         <td class="border px-4 py-2">{{$item->status? 'Active' : 'No active'}}</td>
                         <td class="border px-4 py-2">Edit | Delete</td>
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
</div>