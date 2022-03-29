<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{
    public $usuario;

    public function render()
    {
        $user = User::all();
        return view('livewire.admin.edit-user',compact('user'));
    }
}
