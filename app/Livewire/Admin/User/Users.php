<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Users extends Component
{
    #[Validate('required', message: 'لطفا نام را وارد کنید')]
    public $name;

    #[Validate('required|email')]
    public $email;


    public $mobile;

    #[Validate('required')]
    public $password;


    public $search;

    public $editUserIndex = null;
    #[Computed()]
    public function users() 
    {
        return User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('mobile', 'like', '%' . $this->search . '%')
            ->get();
    }

    #[Js]
    public function restSearch()
    {
        return <<<'JS'
            alert();
        JS;
    }

    public function showEditUser($user_id)
    {

        $this->editUserIndex = $user_id;
        $this->dispatch("showEidtRow", $user_id);
    }
    #[On("updatedwithdis")]
    public function disupdated() {}

    public function updateUser($user_id)
    {
        $this->dispatch('updateRow', $user_id);
    }
    #[On("user_updated")]
    public function user_updated()
    {
        $this->editUserIndex = null;
    }

    #[On("user-create-dispatch")]
    public function userUpdated() {}
    public function render()
    {
        return view('livewire.admin.user.users');
    }
}
