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


    #[Validate('required', message: 'لطفا نام را وارد کنید')]
    public $name;

    #[Validate('required|email')]
    public $email;


    public $mobile;

    #[Validate('required')]
    public $password;

    #[Validate('image|max:8024')] // 1MB Max
    public $photo;

    public $search;

    public $editUserIndex = null;

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
    public function disupdated()
    {

    }

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
    public function userUpdated()
    {

    }

    #[Layout('admin2.layouts.master')]
    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('mobile', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.admin2.user.user-list', compact('users'));
    }
}
