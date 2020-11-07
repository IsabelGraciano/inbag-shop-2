<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection

{

    /**

     * Transform the resource collection into an array.

     *

     * @param \Illuminate\Http\Request $request

     * @return array

     */

    public function toArray($request)

    {

        return [

            'data' => $this->collection,

            'collection-data' => [

                'link' => 'http://ec2-3-89-29-196.compute-1.amazonaws.com/public/index',

            ],

        ];
    }
}