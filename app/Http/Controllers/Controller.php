<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\products;
use App\Models\Korzinka;
use App\Models\User;
use App\Models\product_groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
// use App\Http\Controllers\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('admin.adminmenu');
    }
    public function allproducts(){
        $allproduct=products::all();
        return view('admin.allproducts')->with('allproduct',$allproduct);
    }
    public function edit_product($id){
        $edit=products::find($id);
        $allproduct=product_groups::all();
        return view('admin.editproduct')->with('edit_product',$edit)->with('allproduct',$allproduct);
    }
    public function products(){
        $allproducts=product_groups::all();
        return view('admin.menu')->with('products',$allproducts);
    }
    public function send(Request $request){

        $request->validate([
                'product_name'=>['required','string','max:255'],
                'product_group'=>['required'],
                'product_price'=>['required','integer'],
                'image_url'=>['required','mimes:jpg','max:20000'],
                'description'=>['required','string','max:500']

        ]);
        $file_name_ext=$request->file('image_url')->getClientOriginalName();
        $file_name=str_replace(" ","" ,pathinfo($file_name_ext,PATHINFO_FILENAME));
        $file_ext = $request->file('image_url')->getClientOriginalExtension();

        $db_file_name = $file_name."_".time().".".$file_ext;
        
        $request->file('image_url')->storeAs('public\images\\',$db_file_name);
        // $path_name = 'public/images/'.$db_file_name;

        $product = New products;
        $product->image_url = $db_file_name;
        $product->product_group_id=$request->product_group;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->description=$request->description;
        $product->save();
        
        return redirect('/allproducts')->with('add_product','Product saved successfully!!!');
    }
    public function change_product($id,Request $request){
        $change=products::find($id);
        $change->product_name=$request->product_name;
        $change->product_price=$request->product_price;
        $change->image_url=$request->image_url;
        $change->description=$request->description;
        $change->save();
        return redirect('/allproducts')->with('edit_product','Product changed successfully!!!');
    }
    public function delete_product($id){
        $delete=products::find($id);
        $delete->delete();
        return redirect('/allproducts')->with('delete_product','Product deleted successfully!!!');
    }
    public function menu(){
         return view('menu');
    }
    public function menu2($id){
    //     echo $id;
    // $product=products::();
    // var_dump($product->product_group_id);
    $show = DB::table('products')->where('product_group_id',$id)->get();

    // return $show;
    return view('menu')->with('showmenu',$show)->with('menyu_id',$id);    
        
    }
    public function korzinka($id){
        $allorders = DB::table('korzinkas')->where('user_id',$id)->get();
        $users = DB::table('products')
        ->join('korzinkas', 'korzinkas.product_id', '=', 'products.id')
        ->select( 'product_name', 'product_price','korzinkas.id')
        ->get();
        return view('korzinka')->with('allorders',$allorders)->with('users',$users);
    }
    public function korzinka_database(Request $request){
       $item= new Korzinka;
       $item->product_id=$request->item_id;
       $item->user_id=$request->user_id;
       $show = DB::table('products')->where('product_group_id',$request->menyu_id)->get();
       $item->save();
       return view('/menu')->with('showmenu',$show)->with('menyu_id',$request->menyu_id);

    }
    public function delete_by_id($id){
        $delete=Korzinka::find($id);
        $delete->delete();
        return redirect('/korzinka/{id}')->with('delete_product','Product deleted successfully!!!');
    }
    public function total_cost(Request $request){
        if($request->total_cost=='Hisobla'){
            $total_cost=0;

            foreach($request->products as $product){
                $total_cost += $request->product_amount[$product] * $request->product_price[$product];
            }
            $user=User::find($request->id);
            $user->totalcost=$total_cost;
            $user->save();
            $allorders = DB::table('korzinkas')->where('user_id',$request->id)->get();
            $users = DB::table('products')
            ->join('korzinkas', 'korzinkas.product_id', '=', 'products.id')
            ->select( 'product_name', 'product_price','korzinkas.id')
            ->get();
            return view('korzinka')->with('allorders',$allorders)->with('users',$users)->with('total_cost',$total_cost);
        }else{
            return 'zakaz ber';
        }
    
    }

}
