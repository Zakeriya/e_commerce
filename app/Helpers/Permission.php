<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

  function permission($guard,$permission)
{
    return Auth::guard($guard)->user()->hasPermissionTo($permission);
}


function cartCount()
{
    return count(Cart::all());
}