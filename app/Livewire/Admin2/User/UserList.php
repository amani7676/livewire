<?php

namespace App\Livewire\Admin2\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Js;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserList extends Component
{
    use WithFileUploads;


    #[Validate('image|max:8024')] // 1MB Max
    public $photo;


    #[Layout('admin2.layouts.master')]
    public function render()
    {

        return view('livewire.admin2.user.user-list');
    }
}
