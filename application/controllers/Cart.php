<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('cart');
        
    }
    
    public function add_to_cart()
    {
            $data = array(
                'id'=> $this->input->post('id'),
                'name'=> $this->input->post('name'),
                'qty'=> $this->input->post('quantity'),
                'price'=>$this->input->post('price'),
            );
            $cart_data = $this->cart->insert($data);
            
            $array = array(
                'cart' => $cart_data,
            );
            $this->session->set_userdata($array);
            echo $this->show();
    }

    public function show()
    {
        $no = 0;
        $output = "";
        $cart = $this->cart->contents();
        if ($this->cart->total_items() > 0) {
            echo '<div class="dropup" id="button_cart">

            <button type="button" class="button_cart btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span><i class="far fa-shopping-cart"> </i></span> <span class="badge badge-light">'.$this->cart->total_items().'</span>
            </button>
            <div class="dropdown-menu px-2">
                <table class="table small mr-5 text-wrap">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                ';
                foreach($cart as $item){
                       echo'
                       <tbody> 
                       <tr>
                       <td>'.$item['name'].'</td>
                        <td>'.number_format($item['price']).'</td>
                        <td>'.$item['qty'].'</td>
                        <td>'.number_format($item['subtotal']).'</td>
                        <td><button type="button" id="'.$item['rowid'].'" class="remove_cart btn btn-danger btn-sm">Remove</button></td>
                        </tr>
                        </tbody>';
                    };
                echo '
                <tr>
                    <td colspan="1" class="text-right">Total</td>
                    <td colspan="3" class="text-center">Rp. '.number_format($this->cart->total()).'</td>
                    <td colspan="1"><a class="btn btn-primary btn-sm text-white">Checkout</a></td>
                </tr>
                </table>
                </div>
                </div>';
                //echo '<div class="col-6 align-right">'.$this->total_item().' Item 
                //<button class="remove_cart btn-danger">hapus</button>
                //</div>
                //';
            }
        
        //if(count($cart) > 0){
          //  echo '<div class="col-4">
              //  Total : '.number_format($this->cart->total()).'
            //</div>';
       // }
    }

    public function load_cart()
    {
        $this->show();
    }

    public function remove_cart()
    {
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );

        $this->cart->update($data);
        echo $this->show();
    }

}