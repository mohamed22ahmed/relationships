<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddresses(){
        // this will make a query every loop on addresses record
        return Address::all();

        // to make 2 queries only we should use with method
        return Address::with('user')->get();


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
