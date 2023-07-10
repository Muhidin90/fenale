<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use App\Models\Advert;
use App\Models\Payment;
use DateTime;
use Illuminate\Http\Request;

class AdvertController extends Controller
{

    private $user_card; 
    

    // Get all the adverts
    public function get_advert(Request $request)
    {
        $ads = Advert::paginate(5);
        return view('index', [
            'ads' => $ads
        ]);
    }

    // Get return the advert form
    public function advert(Request $request)
    {
        // dd(auth()->user()->id);
        // Get user card that exist in the card table
        // Check if the logged in user id matches with foreign_key stored in the card table
        // Pass the user card information to the view
        // Show the user card infomation on a readonly form
        // $card = Card::where('user_card_id', auth()->user()->id)->first();
        
        $user_card_info = $this->user_card;
        $user_card_info = Card::where('user_card_id', auth()->user()->id)->first();

        // dd($user_card_info);
        if(empty($user_card_info) || $user_card_info == null){
            $user_card_info  = (object) [
                'card_name'=>'', 
                'card_number'=>'',
                'expire_date'=>'',
                'cvv'=>'',
                'zip_code'=>'',
                'user_card_id'=>'',
            ];
            
            return view('users.advert', [
                'user_card_info' => $user_card_info
            ]);
        }
            // echo(print_r($user_card_info));
            return view('users.advert', [
                'user_card_info' => $user_card_info,
                'user_card_id' => $user_card_info->user_card_id
            ]);
    }
    // Show specific add to the admin
    public function read_advert(Advert $advert)
    {
        // Passing the required advert to the admin view
        return view('admin.advert', [
            'advert' => $advert
        ]);
    }    
    // Display all the adverts to the admin
    public function list(Request $request)
    {
        $adverts = Advert::paginate(50);
        return view('admin.adverts', [
            'adverts' => $adverts
        ]);
    }
    // Store adverts
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'surname' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'last_name' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'gender' => ['required'],
            'age' => ['required'],
            'place' => ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'lost_date' => ['required','date'],
            'image_file' => ['required', 'image:jpg, png, jpeg'],
            'description' => ['required'],
            'reward' => ['required'],
            'phone_number' => ['required', 'digits:10'],
            'related_as' => ['required'],
        ]);

        // PROCESS AN IMAGE
            // get and image path
            $image_path = $request->file('image_file')->store('images', 'public');

        // STORE AN ADVERT
        Advert::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'avg_age' => $request->age,
            'last_seen' => $request->place,
            'lost_date' => $request->lost_date,
            'picture' => $image_path,
            'description' => $request->description,
            'reward_offered' => $request->reward,
            'rel_contact' => $request->phone_number,
            'relation' => $request->related_as,
            'user_id' => $request->user()->id
        ]);
        // Store an card details
        $card = Card::where('user_card_id', auth()->user()->id)->first();
        $user_id = auth()->user()->id;
        $card_id = $card->id;
        $card_number = $card->card_number;
        $amount = 10;
        $status = 'paid';
        $date = new DateTime();

        Payment::create([
            'amount' => $amount,
            'date_paid' => $date,
            'card_number' => $card_number,
            'user_id' => $user_id,
            'card_id' => $card_id,
            'status' => $status,
            ]);
        return redirect('/')->with('success', 'Successful uploaded!');
    }
}
