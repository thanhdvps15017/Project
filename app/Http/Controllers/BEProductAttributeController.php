<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\product_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BEProductAttributeController extends Controller
{
    public function product_attribute(Request $request ,$id){
        $data = DB::table('product_details')
            ->select('product_details.*', 'products.id as pr_id', 'products.name')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('product_details.product_id', $id)
            ->get();
        $product = Product::where('id' , $id)->first();
        return view('admin.product.product_atribute', compact('data', 'product'));
    }
    public function save(Request $request){
        $product_dl = new product_details();

        $product_dl->fill($request->all());
        $product_dl->save();
        return redirect()->back()->with('msg', 'Thêm thuộc tính sản phẩm thành công');
    }
}
