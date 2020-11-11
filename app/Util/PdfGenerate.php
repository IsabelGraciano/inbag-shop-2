<?php 

namespace App\Util;

use App\Interfaces\Pdf;

class PdfGenerate implements Pdf {

    public function generate($data){
        $pdf = \PDF::loadView('product.pdf_cart_View', compact('data'));
        return $pdf->stream('purchase.pdf');
    }
}