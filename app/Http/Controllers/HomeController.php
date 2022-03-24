<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Orders;

class HomeController extends Controller
{
    public function index() {
        if(Auth::id()) {
            return redirect('redirects');
        } else
        $items = food::all();
        $foodchefs = chef::all();
        return view('home', compact('items', 'foodchefs'));
    }

    public function redirects() {
        $items = food::all();
        $foodchefs = chef::all();
        $usertype = Auth::user()->usertype;

        if($usertype == '1') {
            return view('admin.adminhome');
        } else {
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();

            return view('home', compact('items', 'foodchefs', 'count'));
        }
    }
    
    public function reservation(Request $req) {
        $reserve = new Reservation;

        $reserve->name = $req->name;
        
        $reserve->email = $req->email;
        
        $reserve->phone = $req->phone;
        
        $reserve->guest = $req->guest;
        
        $reserve->date = $req->date;
        
        $reserve->time = $req->time;

        $reserve->message = $req->message;

        $reserve->save();
        return redirect('/');
    }

    //adding to cart
    public function addcart(Request $req, $id) {
        if(Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity_id = $req->quantity;

            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity_id;

            $cart->save();

            // dd($user_id);
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $req, $id) {
        $count = cart::where('user_id', $id)->count();
        if(Auth::id() == $id) {
            $cart_items2 = cart::select('*')->where('user_id', '=', $id)->get();
            $cart_items = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
            $infoname = Auth::user()->name;
            // $cartinfos = cart::where('user_id', $id)->join('users', 'carts.user_id', '=', 'users.id')->get();
            return view('showcart', compact('count', 'cart_items', 'cart_items2', 'infoname'));
            
        } else {
            return redirect()->back();
        }
    }

    //delete choosen cart item
    public function removecart($id) {
        $carts = cart::find($id);
        $carts -> delete();
        return redirect() -> back();
    }
    
    public function savecart(Request $req) {

        foreach($req->foodname as $key => $foodname) {
            $cartsave = new orders;
            $cartsave->foodname = $foodname;
            $cartsave->price = $req->foodprice[$key];
            $cartsave->quantity = $req->foodquantity[$key];

            $cartsave->name = $req->name;
            $cartsave->phone = $req->phone;
            $cartsave->address = $req->address;

            $cartsave->save();
        }
        return redirect()->back();

    }

}
