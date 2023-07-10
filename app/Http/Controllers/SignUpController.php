<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\RedirectResponse;
use function PHPUnit\Framework\returnSelf;

class SignUpController extends Controller
{
    public function signup(Request $request)
    {
        return view('authentication.signup');
    }

    public function store(Request $request)
    {
        // dd($request->input('first_name'));
        // Validate form inputs
        $validated = $request->validate([
            'first_name' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/', 'max:25'],
            'surname' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/', 'max:25'],
            'last_name' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/', 'max:25'],
            'gender' => ['required'],
            'phone_number' => ['required', 'digits:10'],
            'card_name' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:10'],
            'card_number' => ['required', 'digits:16'],
            'expire_date' => ['required', 'max:5'], // date should be validated to a specific format
            'cvv' => ['required', 'digits:3'],
            'zip_code' => ['required', 'digits:5'],
            'email' => ['required', 'email'],
            'password' => ['required','confirmed', 'min:6']
        ]);
        // Checkk if email and phone number exist in the database
        // verify an email and phone number
        $email = User::where('email', $request->email)->exists();
        $phone_number = User::where('phone_number', $request->phone_number)->exists();
            if($email){ // check if email exist
                return back()->with('error_status', 'email already exist');
            }elseif ($phone_number){ //check if phone number exist
                return back()->with('error_status', 'Phone number already exist');
            }
            else {
                // Register user
                User::create([
                    'first_name' => $request->first_name,
                    'surname' => $request->surname,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password)
                ]);
                // Register a card
                $user = User::where('email', $request->email)->first();
                Card::create([
                    'card_name' => $request->card_name,
                    'card_number' => $request->card_number,
                    'expire_date' => $request->expire_date,
                    'cvv' => $request->cvv,
                    'zip_code' => $request->zip_code,
                    'user_card_id' => $user->id
                ]);
                // redirect to login
                return redirect()->route('login')
                                ->with('success_status', 'Registered! Login now');
            } 
    }
}
