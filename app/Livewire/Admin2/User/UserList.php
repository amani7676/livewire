<?php

namespace App\Livewire\Admin2\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
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
    public function showEditUser($user_id)
    {
        $user = User::query()->find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->editUserIndex = $user->id;
    }

    public function updateUser($user_id)
    {
        $user = User::query()->find($user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->reset('name', 'mobile', 'password', 'photo', 'email');
        session()->flash('messasge', 'کاربر ویرایش شد');
        $this->editUserIndex = null;

    }
    public function saveUser()
    {

        $this->validate();
        if ($this->photo != null) {

            $name = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->store("photos");
        } else {
            $name = null;
        }


        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
            'image' => $name,
        ]);
        $this->reset('name', 'mobile', 'password', 'photo', 'email');
        session()->flash('messasge', 'کاربر جدید ایجاد شد');
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
