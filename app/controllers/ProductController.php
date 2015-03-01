<?php

class ProductController extends BaseController {
    
        protected $product;

        public function __construct(Product $product)
        {
            $this->product = $product;
        }

        public function index()
	{
		$products = $this->product->orderBy('id','desc')->get();
                return View::make('products.index', ['products' => $products])->with('nav',Page::navbar());
	}
        
        public function store()
	{
		$products = $this->product->whereType('store')->orderBy('id','desc')->get();
                return View::make('products.store', ['products' => $products])->with('cart',Session::get('cart',Array()))->with('nav',Page::navbar());
	}
        
        public function storeAdd($id)
	{
		$p = $this->product->whereId($id)->first();
                if($p != null && $p->type=='store'){
                    $cart = Session::get('cart',Array());
                    $cart[] = $p;
                    Session::put('cart',$cart);
                }
                return Redirect::to('/store');
	}
        
        public function storeAddKassa($id)
	{
		$p = $this->product->whereId($id)->first();
                if($p != null && $p->type=='kassa'){
                    $cart = Session::get('cart',Array());
                    $cart[] = $p;
                    Session::put('cart',$cart);
                }
                return Redirect::to('/kassa');
	}
        
        public function storeClear()
	{
		Session::pull('cart');
                return Redirect::to('/store');
	}
        public function kassaClear()
	{
		Session::pull('cart');
                return Redirect::to('/kassa');
	}
        
        public function kassa()
	{
		$products = $this->product->whereType('kassa')->orderBy('id','desc')->get();
                return View::make('products.kassa', ['products' => $products])->with('cart',Session::get('cart',Array()))->with('nav',Page::navbar());
	}
        
        public function show($id)
        {
                $this->product = Product::whereId($id)->first();
                return View::make('products.show')->with('product',$this->product)->with('nav',Page::navbar());
            
        }
        
        public function edit($id=null){
            if($id != null){
                $this->product = $this->product->whereId($id)->first();
            }
            else{
                //We will init empty form
            }
            
            return View::make('products.edit')->with('product',$this->product)->with('nav',Page::navbar());
            
        }
        
        public function remove($id=null){
            if($id != null){
                $this->product = $this->product->whereId($id)->first();
                $this->product->delete();
            }
            else{
                //Do nothing
            }
            
            $message = '<p class="box-rounded notis">Producten har raderats!</p>';
            return Redirect::to('crew/')->with('message',$message);
            
        }
        
        public function update($id=null){
            
            if($id != null){
                $this->product = $this->product->whereId($id)->first();
            }
            else{
                // Do nothing if new product
                dd("new");
            }
            
            $newproduct = Input::only(['name','price','imageurl','start','stop','type']);
            
            $this->product->fill($newproduct);
            
            if($id != null && $this->product->isValid()){
                $this->product->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('products/'.$this->product->id)->with('message',$message);
            }
            else if($this->product->isValid()){
                $this->product->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('products/'.$this->product->id)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->product->errors)->with('nav',Page::navbar());
            }
        }

}
