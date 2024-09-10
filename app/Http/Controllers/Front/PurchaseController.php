<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases=Purchase::where('user_email',Auth::user()->email)->get();
        return view('users.purchases',get_defined_vars());
    }

    
}
