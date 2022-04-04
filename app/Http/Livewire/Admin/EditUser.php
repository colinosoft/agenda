<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{

    // public $user,$title;
    // public $name;
    // public $email;

    // protected $listeners = ['usuario'];
    public $user,$title;

    protected $rules = [
        'user.name' => 'requiered',
        'user.email' => 'requiered'
    ];

    public function mount(User $user){
        $this->user = $user;
    }


    public function render()
    {

        // return view('livewire.admin.edit-user',compact('user'));
         return view('livewire.admin.edit-user');
    }


    // public function usuario($id)
    // {

    //     // $this->consulta=  User::where('id',$id)->first();
    //     $this->user =  User::find($id);
    //     $this->name = $this->user->name;
    //     $this->email = $this->user->email;
    //     // $email = $this->user->email;
    // }

    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }

    public function saveUser(){

    }
}
