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

    }

    public function add(){
        $Product = Vehicle::findOrfail(3); // assuming you have a Product model with id, name, description & price
        $rowId = 456; // generate a unique() row ID
        $userID = 2; // the user ID to bind the cart contents

        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->name,
            'price' => '200',
            'quantity' => 4,
        ));

        $items = \Cart::getContent();
        foreach($items as $row) {

            echo $row->id;
            echo $row->name;
            echo $row->qty;
            echo $row->quantity;
          
        }
        
    }
    public function update(){

        // update the item on cart
        \Cart::session($userID)->update($rowId,[
            'quantity' => 2,
            'price' => 98.67
        ]);
        
    }

    public function delete(){
        // delete an item on cart
        \Cart::session($userID)->remove($rowId);
    }


}
