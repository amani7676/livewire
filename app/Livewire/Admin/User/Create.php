<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required', message: 'لطفا نام را وارد کنید')]
    public $name;

    #[Validate('required|email')]
    public $email;


    public $mobile;

    #[Validate('required')]
    public $password;

    // #[Validate('image|max:8024')] // 1MB Max
    public $photo;

    public $editUserIndex = null;

    #[On("updateRow")]
    public function update($user_id)
    {
        $user = User::query()->find($user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->reset('name', 'mobile', 'password', 'photo', 'email');
        session()->flash('messasge', 'کاربر ویرایش شد');
        $this->dispatch("updatedwithdis");
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
        /** */
        $this->dispatch('user-create-dispatch');
        session()->flash('messasge', 'کاربر جدید ایجاد شد');
    }
    #[On("showEidtRow")]
    public function ShowEditSelectedUser($user_id)
    {
        $user = User::query()->find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->editUserIndex = $user_id;
    }
    public function render()
    {

        return view('livewire.admin.user.create');
    }
}
