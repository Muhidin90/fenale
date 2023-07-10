<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Return all the payments
        $users = User::all()->count();
        $adverts = Advert::all()->count();
        $payments = Payment::where('status','paid')->get();
        $total = $payments->sum('amount');
        // dd($total);
        return view('admin.dashboard', [
            'users' => $users,
            'adverts' => $adverts,
            'total' => $total
        ]);
    }
    
}
