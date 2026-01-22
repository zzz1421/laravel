<?php
namespace App\Http\Controllers;
class ProductController extends Controller {
    public function suite() { return view('products.suite'); } // FOEX Suite 페이지
    public function node() { return view('products.node'); }   // FOEX Node 페이지
}