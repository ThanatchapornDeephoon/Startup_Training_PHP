<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\Product as productMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
$mods = UserMod::all();
$mods = UserMod::paginate(15);

        return view('admin.user.lists',compact('mods'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //dd(Srequest); exit;
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$mod = UserMod::find($id);
        // echo $mod->name;
        //$shop = ShopMod::find($id);
        //echo $shop->name;
        //echo "<br />" ;
        //echo $shop->user->name;

       // $products = ShopMod::find($id)->products;
 
       
       /// foreach ($products as $product) {
         ///   echo $product->name;
          //  echo "<br />" ;
       // }

        $product = productMod::find($id);
        echo " Product Name Is :". $product->name;
        echo "<br /><br />";
        echo "Shop Owner Is :" .$product->shop->name;
           
    }
        


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            //return "ABC";

            //dd($request); exit;
            $mod = UserMod::find($id);
            $mod->name = $request->name;
            $mod->email = $request->email;
            $mod->password = bcrypt($request->password);
            $mod->save();

            return "เรียบร้อย" ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $mod = UserMod::find($id);
        $mod->delete();
        return "สำเร็จ";

    }
}
