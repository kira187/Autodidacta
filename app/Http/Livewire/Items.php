<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;
use App\Models\User;

class Items extends Component
{
    use WithPagination;
    public $active, $q, $sortBy = 'id', $sortAsc = true, $item;
    Public $confirmItemDeletion = false, $confirmItemAdd = false;

    //Muestra los queryes aplicados en la url
    protected $queryString = [
        'active' => ['except' => false],
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true],
    ];

    protected $rules = [
        'item.name' => 'required|string|min:4',
        'item.price' => 'required|numeric|between:1,100',
        'item.status' => 'bool',
    ];

    public function render()
    {
        $items = Item::where('user_id', auth()->user()->id)
                ->when($this->q, function( $query ) {
                    return $query->where( function($query) {
                        $query->where('name', 'LIKE', '%'.$this->q. '%')
                            ->orWhere('price', 'LIKE', '%'.$this->q. '%');
                    });
                })
                ->when($this->active, function( $query ) {
                    return $query->active();
                })
                ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' );
        
        $query = $items->toSql();
        $items = $items->paginate(10);

        return view('livewire.items', compact('items', 'query'));
    }

    //resetea la pagina antes de hacer query de activos
    public function updatingActive()
    {
        $this->resetPage();
    }

    //resetea la pagina antes de hacer una busqueda
    public function updatingQ()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc =! $this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmItemDeletion($id)
    {
        $this->confirmItemDeletion = $id;
    }

    public function deleteItem(Item $item)
    {
        $item->delete();
        $this->confirmItemDeletion = false;
        session()->flash('message', 'Item Deleted Successfuly');
    }

    public function confirmItemAdd()
    {
        $this->reset(['item']);
        $this->confirmItemAdd = true;
    }

    public function confirmItemEdit(Item $item)
    {
        $this->item = $item;
        $this->confirmItemAdd = true;
    }

    public function saveItem()
    {
        $this->validate();

        if (isset($this->item->id)) {
            $this->item->save();
            session()->flash('message', 'Item Updated Successfuly');
        } else {
            auth()->user()->items()->create([
                'name' => $this->item['name'],
                'price' => $this->item['price'],
                'status' => $this->item['status'] ?? 0
            ]);
            session()->flash('message', 'Item Added Successfuly');
        }

        $this->reset(['item']);
        $this->confirmItemAdd = false;
    }
}
