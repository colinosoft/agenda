<?php

namespace App\Http\Livewire\Admin;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class EditUser extends ModalComponent
{

    // public $user,$title;
    // public $name;
    // public $email;

    // protected $listeners = ['usuario'];
    public $title = "Editar usuarios";
    public User $user;

    protected $rules = [
        'user.name' =>  ['requiered', 'string'],
        'user.email' => ['requiered', 'email']
    ];

    // protected function rules(): array
    // {
    //     return  [
    //         'user.name' => ['requiered', 'string'],
    //         'user.email' => ['requiered', 'email']
    //     ];
    // }
    public function mount(User $user){
        $this->user = $user;
    }


    public function render()
    {

        // return view('livewire.admin.edit-user',compact('user'));
         return view('livewire.admin.edit-user');
    }

    public function update()
    {
        // $this->validate();

        $this->user->save();

        $this->closeModalWithEvents([
            UsersIndex::getName() => 'userUpdate',
        ]);
    }



}
