<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class UserList extends Component
{
    public $name, $email, $password, $about, $location;

    protected $rules = [
        'name'     => 'required|min:6|max:255|unique:users,name',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required',
        'about'    => '',
        'location' => '',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        UserModel::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'about'    => $this->about,
            'location' => $this->location,
        ]);

        session()->flash('message', 'Item successfully submitted');

        $this->reset();
    }

    protected function getData()
    {
        return [
            'data' => UserModel::whereIsAdmin(false)->whereIsGuest(false)->get(),
        ];
    }

    public function render()
    {
        return view('livewire.user-list', $this->getData());
    }
}
