<?php

namespace App\Http\Livewire\Auth;

use App\Models\CorporateClient;
use App\Models\IndividualClient;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $username_connection = '';
    public $is_corporate = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6',
        'username_connection' => 'required|min:1'
    ];

    public function mount()
    {
        if (auth()->user()) {
            $id = Auth::id();
            $user = User::where('id', $id)->first();
            if ($user->hasRole('individual_client')) {
                return redirect('/personal-cabinet');
            } else if ($user->hasRole('corporate_client')) {
                return redirect('/business-cabinet');
            }
            return redirect('/dashboard');
        }
    }

    public function register()
    {
        $this->validate();
        $client = '';
        if ($this->is_corporate) {
            $client = CorporateClient::where('username', $this->username_connection)->first();
        } else {
            $client = IndividualClient::where('username', $this->username_connection)->first();
        }
        if (is_null($client)) {
            // TO DO
            // $this->dispatchBrowserEvent('alert', 'Modal should be shown');
            return;
        }
        $client_id = $client->id;

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'individual_client_id' => $this->is_corporate ? null : $client_id,
            'corporate_client_id' => $this->is_corporate ? $client_id : null,
        ]);
        if ($this->is_corporate) {
            // if (Count(Role::findByName('corporate_client')->get()) == 0) {
            // $role = Role::create(['name' => 'corporate_client']);
            // $permission = Permission::create(['name' => 'personal_cabinet_access']);
            // $role = Role::where(['name', 'corporate_client']);
            // $permission = Permission::where('name', 'business_cabinet_access')->first();
            // $role->givePermissionTo($permission);
            // $permission->assignRole($role);
            // }
            $user = User::where('email', $this->email)->first();
            $user->assignRole('corporate_client');
        } else {
            // if (Count(Role::findByName('individual_client')->get()) == 0) {

            // $role = Role::create(['name' => 'individual_client']);
            // $permission = Permission::create(['name' => 'personal_cabinet_access']);
            // $role->givePermissionTo($permission);
            // $permission->assignRole($role);
            // }
            $user = User::where('email', $this->email)->first();
            $user->assignRole('individual_client');
        }


        auth()->login($user);
        // $id = Auth::id();
        // $user = User::where('id', $id)->first();
        if ($user->hasRole('individual_client')) {
            return redirect('/personal-cabinet');
        } else if ($user->hasRole('corporate_client')) {
            return redirect('/business-cabinet');
        }
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
