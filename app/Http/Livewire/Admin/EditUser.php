<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{

    public $user;
    public $nombre;
    public $email;

    protected $listeners = ['usuario'];

    public function render()
    {

        // return view('livewire.admin.edit-user',compact('user'));
         return view('livewire.admin.edit-user');
    }

    public function usuario($id)
    {

        // $this->consulta=  User::where('id',$id)->first();
        $this->user =  User::find($id);
        $this->nombre = $this->user->name;
        $this->email = $this->user->email;
        // $email = $this->user->email;
    }

    public function resetInputFields(){
        $this->nombre = '';
        $this->email = '';
    }

}
