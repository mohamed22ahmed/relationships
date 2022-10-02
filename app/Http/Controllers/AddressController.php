<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddress(){
        // this will make a query every loop on addresses record
        // return Address::all();

        // to make 2 queries only we should use with method
        // Address::with('user')->get();

        // here has gets the users who has address only
        // $users = User::has('address')->with('address')->get();

        // here has gets the users who has address more than 2 addresses
        // $users = User::has('address', '>=', 2)->with('address')->get();

        // get the user which has the address with substring 'Egy'
        // $users = User::whereHas('address', function($query){
        //     $query->where('country', 'like', '%Egy%');
        // })->with('address')->get();

        // get the users who don't have any address
        // $users = User::doesntHave('address')->with('address')->get();

        return view('address', compact('users'));
    }

    public function getAllAddresses(){
        return User::with('addresses')->get();
    }

    public function createAddress()
    {
        $user = User::find(1);

        // first way
        Address::create([
            'user_id' => $user->id,
            'country' => 'Egypt'
        ]);

        // second way
        $user->address()->create([
            'country' => 'Egypt'
        ]);
    }
}
