<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.home-component')->layout("layouts.base");
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->save();
        
        return redirect('/')->with('message', 'Your data added successfuly');
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email' =>'required |max:191',
            'phone' => 'required|numeric|size:11'
            ]);
}
}
