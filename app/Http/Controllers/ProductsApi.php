<?php

namespace App\Http\Controllers;
use Http;


class ProductsApi extends Controller
{
    public function appi_rest_consum()
    {
      $bestProductsApi=[];
      $asw = Http::get('http://www.agricolae.tk/public/api/products');
      

      for($i=0; $i<20; $i++){
        array_push($bestProductsApi,$asw["data"][$i]);
      
    
      }
      $data["products"]= $bestProductsApi;
      
      echo($asw["data"][1]["image"]);
    # return view('product.productsApi')->with("data", $data);
    }

}