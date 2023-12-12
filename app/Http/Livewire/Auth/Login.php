<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->user()) {
            $id = Auth::id();
            $user = User::where('id', $id)->first();
            if ($user->hasRole('administrator')) {
                return redirect('/dashboard');
            }
            else if($user->hasRole('corporate_client')){
                return redirect('/business-cabinet');
            }
            redirect('/personal-cabinet');
        }
        // CLEAR LATER!!!
        $this->fill(['email' => 'admin@mail.com', 'password' => '123456']);
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            // if($user->email == "admin@mail.com"){
            //     $role = Role::create(['name' => 'administrator']);
            //     $permission = Permission::create(['name' => 'full_access']);
            //     $role->givePermissionTo($permission);
            //     $permission->assignRole($role);
            //     $user->assignRole('administrator');
            // }
            auth()->login($user, $this->remember_me);
            if ($user->hasRole('administrator')) {
                return redirect()->intended('/dashboard');
            }
            else if($user->hasRole('corporate_client')){
                return redirect()->intended('/business-cabinet');
            }
            return redirect()->intended('/personal-cabinet');
        } else {
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
