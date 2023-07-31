<?php

namespace App\Http\Controllers\ItemShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\User;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function viewItemShop() {
        $categories = Categories::get();
        return view('itemshop.index', compact(['categories']));
    }

    public function products() {
        $products = Products::get();
        $productsDict = [];
        foreach($products as $product) {
            $data = [
                'Id' => $product->id,
                'Name' => $product->name,
                'Description' => $product->description,
                'Bonuses' => $product->bonuses,
                'Category_Id' => $product->category_id
            ];
            array_push($productsDict, $data);
        }
        return $productsDict;
    }

    public function login($player_id, $sas) {
        $sas_key = 'GYFF5436SRFA432GAG';
        $user = Player::where('id', $player_id)->first();
        $account_id = $user->account_id;
        $new_sas = sprintf("%u%u%s", $player_id, $account_id, $sas_key);
        if($new_sas == $sas) {
            $user = User::where('id', $account_id)->first();
            if($user) {
                Auth::login($user);
                return redirect()->route('app.itemshop.home');
            }   
        }
    }

    public function testview() {
        return view('itemshop.test');
    }
}
