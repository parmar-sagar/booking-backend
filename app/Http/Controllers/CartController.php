<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class CartController extends Controller
{
    const ControllerCode = "CT_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        return view('front.pages.cart.index');
    }

    public function add($id){
    
        $Product = Vehicle::where('random_id',$id)->get()->toArray(); 

        // add the product to cart
            \Cart::add(array(
                'id' => $id,
                'name' => $Product[0]['name'],
                'price' => 200,
                'quantity' => 1,
            ));   
    }
    public function update($id){

        // update the item on cart
        \Cart::update($id,[
            'quantity' => 2,
        ]);
        
    }

    public function delete($id){
        // delete an item on cart
        \Cart::remove($id);
    }


}
