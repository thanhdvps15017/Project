<?php

namespace App\Http\Controllers;

use App\Model\UserCart;
use App\Models\orders;
use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller
{


    function index()
    {
        $list = DB::table('orders')->orderBy('created_at', 'desc')->Paginate(2);
        $customers = DB::table('users')->select('name', 'id')->get();
        $data = ['list' => $list, 'customers' => $customers];
        return view("admin/orders/index", $data);
    }

    function detail($id){
        $list = DB::table('order_detail')->where('order_id', $id)->get();
        $pd_list = DB::table('products')->select('name', 'id')->get();
        $data = ['list' => $list, 'pd_list' => $pd_list];
        return view("admin/orders/detail", $data);
    }
    public function filter(Request $request){
        $customers = DB::table('users')->select('name', 'id')->get();
        $status = $request->input('status');
        $arrange = $request->input('arrange');
        $code = $request->input('code');
        $page = $request->input('page', 1);
        $query = DB::table('orders');
        if ($status) {
            $query->where('status', $status);
        }
        if ($code) {
            $query->where('code', $code);
        }
        if ($arrange == 'newest') {
            $query->orderBy('updated_at', 'desc')->limit(10);
        } else if ($arrange == 'oldest') {
            $query->orderBy('updated_at', 'asc')->limit(10);
        }
        $list = $query->paginate(10, ['*'], 'page', $page);
        $html = view('Modals.back_end.order_load')
            ->with(['list' => $list,'customers' => $customers ])
            ->render();
        return response()->json(['BODY' => $html]);
    }

    public function update_status(Request $request, $id){
        $cart = orders::find($id);
        if ($cart) {
            $cart->update([
                'status' => $request->status,
            ]);
        }
        return response()->json([]);

    }
}
