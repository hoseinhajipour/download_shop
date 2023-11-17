<?php

namespace App\Components\Pages\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class EditProfile extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
        ];
    }

    public function route()
    {
        return Route::get('/dashboard/profile-edit')
            ->name('dashboard.EditProfile')
            ->middleware('auth');
    }

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;

    }

    public function render()
    {
        return view('pages.dashboard.edit-profile')->layout('layouts.dashboard');
    }

    public function update()
    {
        $this->validate();

        if (!$this->honeyPasses()) {
            return null;
        }

        $user = Auth::user();
        if (!empty($this->password) && !empty($this->password_confirmation)) {
            if ($this->password == $this->password_confirmation) {
                $user->password = bcrypt($this->password);
            } else {
                return null;
            }
        } else {
            return null;
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

    }
}
