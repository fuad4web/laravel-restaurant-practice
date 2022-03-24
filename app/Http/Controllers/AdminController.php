<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Orders;

class AdminController extends Controller
{
    public function user() {
        $datas = user::all();
        return view('admin.users', compact("datas"));
    }

    //delete user
    public function deleteuser($id) {
        $datas = user::find($id);
        $datas -> delete();
        return redirect() -> back();
    }

    //food function
    public function foodsmenu() {
        $foods = food::all();
        return view('admin.foodmenu', compact("foods"));

        // $req->validate([
        //     'title' => 'required | min:5 | max:20',
        //     'price' => 'required | min:2 | max:5',
        //     'description' => 'required | min:10 | max:70'
        // ]);
        // return $req->input();
    }

    //delete foods item
    public function deletefood($id) {
        $foods = food::find($id);
        $foods -> delete();
        return redirect() -> back();
    }

    //update foods
    public function updatefoods($id) {
        $foods = food::find($id);
        return view('admin.updatefood', compact('foods'));
    }

    public function updatefoodies(Request $req, $id) {
        $foods = food::find($id);
        
        $foods->title = $req->title;

        $image = $req->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('foodimage', $imagename);
            $foods->image = $imagename;
        
        $foods->price = $req->price;
        
        $foods->description = $req->description;

        $foods->save();
        // return redirect()->back();
        return redirect('foodsmenu');
    }

    //food function
    public function upload(Request $req) {
        $item = new food;

        $image = $req->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $req->image->move('foodimage', $imagename);
        $item->image = $imagename;

        $item->title = $req->title;
        
        $item->price = $req->price;
        
        $item->description = $req->description;

        $item->save();
        return redirect()->back();
    }

    public function reservations() {
        if(Auth::id()) {
            $reservations = Reservation::all();
            return view('admin.reservation', compact("reservations"));
        } else {
            return redirect('login');
        }
    }

    public function chef() {
        $chefs = chef::all();
        return view('admin.chef', compact("chefs"));
    }

    public function inputChef(Request $req) {
        $chefs = new chef;

        $image = $req->chefimage;
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $req->chefimage->move('chefImage', $imgname);
        $chefs->image = $imgname;

        $chefs->name = $req->chefname;
        
        $chefs->role = $req->chefrole;

        $chefs->save();
        return redirect()->back();
    }

    //delete Chefs
    public function deletechef($id) {
        $chefs = chef::find($id);
        $chefs -> delete();
        return redirect() -> back();
    }

    //update chef
    public function updatechefs($id) {
        $chefs = chef::find($id);
        return view('admin.updatechef', compact('chefs'));
    }

    public function updatechef(Request $req, $id) {
        $chefs = chef::find($id);
        
        $chefs->name = $req->name;

        $image = $req->image;
        if($image) {
        $imgname = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('chefImage', $imgname);
            $chefs->image = $imgname;
        }
        
        $chefs->role = $req->role;

        $chefs->save();
        return redirect('chef');
    }

    public function orders() {
        $zero = 0;
        $orders = orders::where('ordered', $zero)->get();
        return view('admin.order', compact("orders"));
    }

    public function searchorders(Request $req) {
        $search = $req->search;
        $orders = orders::where('name', 'Like', '%'.$search.'%')->orWhere('foodname', 'Like', '%'.$search.'%')
        ->get();
        return view('admin.order', compact('orders'));
    }

    public function ordered($id) {
        $orders = orders::find($id);
        $orders->ordered = 1;
        $orders->save();
        return redirect() -> back();
    }

}
