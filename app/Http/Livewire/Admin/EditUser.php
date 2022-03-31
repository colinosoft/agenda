<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{

    public $post;

    protected $listeners = ['pasar'];

    public function render()
    {

        // return view('livewire.admin.edit-user',compact('user'));
        return view('livewire.admin.edit-user');
    }
    public function pasar()
    {
        $this->post = User::count();
    }

}
