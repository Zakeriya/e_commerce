<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('update-post', function (Seller $seller, Product $product) {
        //     return $user->id === $post->user_id;
        // });

        // Gate::define('edit_product', function (Product $product) {
        //     // dd($product->seller_id);
        //     return Auth::guard('seller')->user()->id ==$product->seller_id
        //                 ? Response::allow()
        //                 : Response::deny('This Is Not Your Product');
        // });

        Gate::define('edit_product', function (Seller $seller, Product $product) {
            return $seller->id == $product->seller_id
                ? Response::allow()
                : Response::deny('This is not your product.');
        });

        Gate::define('delete_product', function (Seller $seller, Product $product) {
            return $seller->id == $product->seller_id
                ? Response::allow()
                : Response::deny('This is not your product.');
        });

        
    }
}
