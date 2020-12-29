<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;
    public $active, $q, $sortBy = 'id', $sortAsc = true;

    //Muestra los queryes aplicados en la url
    protected $queryString = [
        'active' => ['except' => false],
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true],
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
}
