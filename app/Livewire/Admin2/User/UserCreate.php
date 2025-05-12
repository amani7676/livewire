<?php

namespace App\Livewire\Admin2\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserCreate extends Component
{
    #[Layout('admin2.layouts.master')]
    public function render()
    {
        return view('livewire.admin2.user.user-create');
    }
}
