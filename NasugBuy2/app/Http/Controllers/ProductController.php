<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::all()->where('userid','=',Auth::user()->id);
        return view('pages.products.index', compact('Products'));
        // return view('pages.products.index');
    }
    public function create(){

        $user = Auth()->id();
        return view('pages.products.create', compact('user'));
    }

    // public function dropzone(){
    //     return view('create');
    // }

    // public function dropzoneStore(Reqest $request){
    //     $image = $request->file('file');
    //     $imageName = time().'.'.$image->extension();
    //     $image->move(public_path('img'),$imageName);
    //     return response()->json(['success'=>$imageName]);
    // }

    public function store(Request $request, FileUploadService $fileuploadService){
        $data = $request->all();

        $request -> validate([
            'userid' => 'required',
            'name' => 'required',
            'details' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

         $data['image'] = $fileuploadService->uploadImage($request->file('file'));
         Product::create($data);

        return redirect()->back()->with(['message'=>'Added Successful']);
    }
    //for edit
    public function edit($id){
        $product = Product::find($id);
        return view('pages.products.edit',compact('product'));

    }
    public function destroy($id){

        $product = Product::find($id);
        $product->delete();

        return redirect()->back();

    }
    //for update
    public function update(Request $request, FileUploadService $fileuploadService){
        $data = $request->all();

        $request -> validate([
            'name' => 'required',
            'details' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        Product::find($request->id)->update($data);

        return redirect()->back()->with(['message'=>'Update Successful']);
    }

    public function cart(){
        return view('pages.products.cart');
    }
    // by this function we add product of choose in card
    public function addToCart($id) {
     $product = Product::find($id);

     if(!$product) {

         abort(404);

     }
     $cart = session()->get('cart');

     // if cart is empty then this the first product
     if(!$cart) {

         $cart = [
                 $id => [
                     "name" => $product->name,
                     "quantity" => 1,
                     "price" => $product->price,
                     "photo" => $product->image
                 ]
         ];

         session()->put('cart', $cart);

         return redirect()->back()->with('success', 'added to cart successfully!');
     }

     // if cart not empty then check if this product exist then increment quantity
     if(isset($cart[$id])) {

         $cart[$id]['quantity']++;

         session()->put('cart', $cart); // this code put product of choose in cart

         return redirect()->back()->with('success', 'Product added to cart successfully!');

     }

     // if item not exist in cart then add to cart with quantity = 1
     $cart[$id] = [
         "name" => $product->name,
         "quantity" => 1,
         "price" => $product->price,
         "photo" => $product->image
     ];

     session()->put('cart', $cart); // this code put product of choose in cart

     return redirect()->back()->with('success', 'Product added to cart successfully!');
 }
 public function remove(Request $request)
 {
     if($request->id) {

         $cart = session()->get('cart');

         if(isset($cart[$request->id])) {

             unset($cart[$request->id]);

             session()->put('cart', $cart);
         }

         session()->flash('success', 'Product removed successfully');
     }
 }

}

