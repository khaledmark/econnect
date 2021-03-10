<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ContactMail;
use App\Models\Aboutus;
use Validator;
use Mail;
use Livewire\Component;

class AboutComponent extends Component
{
    public function contact()
    {
        return view('livewire.home-component')->layout("layouts.base");
    }

    public function sendEmail(Request $request)
    {
            $details=[
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
            ];

            Mail::to('k.muhammed3601@gmail.com')->send(new ContactMail($details));

            $user = new User;
            $user->firstname = request('firstname');
            $user->lastname = request('lastname');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->save();
            
            // return redirect('/')->with('message', 'Your data added successfuly');
        

            return back()->with('message_sent','Your Data has been sent successfully!');
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
