<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
// use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search, $userId;

    public function updatingSearch(){

        $this->resetPage();
        // Prueba

    }

    public function render()
    {

        $users = User::where('name', 'LIKE' , '%'. $this->search . '%')
                        ->orWhere('email','LIKE', '%'. $this->search . '%')
                        ->paginate();

        return view('livewire.admin.users-index', compact('users'));

    }
    public function usuario($id){
        // $user = User::where('id',$id)->first();
        $this->userId = $id;
        $this->emit('usuario', $this->userId);
    }

}
