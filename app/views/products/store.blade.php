@extends('v1-wrapper')

@section('title')
    Store
@stop

@section('contentname')
    Store
@stop

@section('contenttitle')
    Dags för att boka?
@stop

@section('content')
<div class="row">
    @foreach ($products as $product)
        
    <div class="col-sm-6 col-md-3">
        
      <a href="/store/add/{{$product->id}}" class="thumbnail">
          <img src="{{$product->imageurl}}" 
               alt="{{$product->name}}">
      </a>
        <p>{{$product->name}}</p>
   </div>

    @endforeach
    </div>

@if ($cart != null)
    <h3>Varukorg</h3>
    <p>
        Om du har gjort fel kan du {{link_to('/store/empty','tömma')}} din varukorg!
    </p>
    <p>
        <?php $sum=0;?>
        @foreach ($cart as $item)
            <?php $sum+=$item->price; ?>
        @endforeach
        Du har {{sizeof($cart)}} varor i korgen, till ett onlinepris av {{$sum}}.
    </p>

    <div class="row">
        @foreach ($cart as $item)
        <span class="glyphicon glyphicon-shopping-cart"></span> {{$item->name}}<br />

        @endforeach
        </div>
    <br />
    <h3>Checkout</h3>
    <p>
        Du kan betala med kort, paypal, bankgiro eller på plats. Vid betalning på plats tillkommer +20kr per bokad biljett i administrativ avgift,
        så det är både billigare och enklare att betala direkt!
    </p>
    <p>
        Bokningen är bindande och du godkänner de regler som är uppsatta för evenemanget du bokar.
    </p>
    
    <button type="button" class="btn btn-default btn-lg">
        Kort
    </button>
    <button type="button" class="btn btn-default btn-lg">
        PayPal
    </button>
    <button type="button" class="btn btn-default btn-lg">
        Bankgiro / Kontant
    </button>
    
    <br />
    
@endif

@stop