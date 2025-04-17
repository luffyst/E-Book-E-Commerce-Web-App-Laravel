<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books  = Book::all();

        return view('admin.show',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $books= new Book();
        $books->name = $request->name;
        $books->cid = $request->category;
        $books->desc = $request->desc;
        $books->price = $request->price;
        $books->qty = $request->qty;
        if($request->hasFile('img'))
        {
            $file =time().'.'.$request->img->extension();
            $request->img->move(public_path('uploads/images'),$file);
            $books->img ='uploads/images/'.$file;
        }
       
        if($request->hasFile('book'))
        {
            $file =time().'.'.$request->book->extension();
            $request->book->move(public_path('uploads/books'),$file);
            $books->book ='uploads/books/'.$file;
        }
        $books->save();
        return redirect()->route('show');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);
        return view('user.bookdetail', compact('books'));
    }
    public function allshow()
    {
        $books = Book::all();
        return view('user.books', compact('books'));
    }
    public function updateqty($id,Request $request)
    {
        $books = Cart::find($id);
        // dd($request->qty);die();
        $books->qty = $request->qty;
        $books->update();
        return redirect()->route('show.cart');;
    }
    
    public function cart(string $id,Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productId = $request->id;
            
            // Check if the product already exists in the user's cart
            $existingCart = Cart::where('userid', $userId)->where('bookid', $productId)->first();
        
            if ($existingCart) {
                // If the product already exists, update the quantity or take other action
                $existingCart->qty += $request->qty;
                $existingCart->price += $request->price * $request->qty;
                $existingCart->save();
            } else {
                // If the product doesn't exist in the cart, create a new entry
                $cart = new Cart;
                $cart->userid = $userId;
                $cart->bookid = $productId;
                $cart->price = $request->price * $request->qty;
                $cart->qty = $request->qty;
                $cart->save();
            }
        
            return redirect()->route('show.cart');
        } else {
            return redirect()->back()->with('msg', 'Please login to continue');
        }
        
        
    }

    public function showcart()
    {
        if(Auth::check())
        {
            $userid = Auth::user()->id;
            $carts =  Cart::where('userid', $userid)
            ->join('books', 'carts.bookid', '=', 'books.id')
            ->select('books.img', 'books.name','books.price','carts.qty','carts.id','carts.bookid')
            ->get();
            return view('user.cart', compact('carts'));
        }
       
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::find($id);
        $categories = Category::all();
        return view('admin.edit',compact('books', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Book::find($id);
        $books->name = $request->name;
        $books->cid = $request->category_id;
        $books->desc = $request->desc;
        $books->price = $request->price;
        $books->qty = $request->qty;
        if($request->hasFile('img'))
        {
            if(file_exists($books->img))
        {
            unlink($books->img);

        }
            $file =time().'.'.$request->img->extension();
            $request->img->move(public_path('uploads/image'),$file);
            $books->img ='uploads/image/'.$file;
            
        }
        if($request->hasFile('book'))
        {
            if(file_exists($books->book))
        {
            unlink($books->book);

        }
            $file =time().'.'.$request->book->extension();
            $request->book->move(public_path('uploads/books'),$file);
            $books->book ='uploads/books/'.$file;
            
        }
        $books->save();
        return redirect()->route('show');
        $books->update();
        return redirect()->route('show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        $books->delete();
        return redirect()->route('show');
    }
    public function removecart(string $id)
    {
        $carts = Cart::find($id);
        $carts->delete();
        return redirect()->route('show.cart');
    }
}
