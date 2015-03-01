@extends('v1-wrapper')

@section('title')
    Kassa
@stop

@section('contentname')
    Kassa
@stop

@section('contenttitle')
    Kaffe och kakor åt folket!
@stop

@section('content')
<div class="row">
    @foreach ($products as $product)
        
    <div class="col-sm-6 col-md-3">
        
      <a href="/store/addKassa/{{$product->id}}" class="thumbnail">
          <img src="{{$product->imageurl}}" 
               alt="{{$product->name}}">
      </a>
        <p>{{$product->name}}</p>
   </div>

    @endforeach
    </div>

@if ($cart != null)
    <h3>Checkout</h3>
    <p>
        <?php $sum=0;?>
        @foreach ($cart as $item)
            <?php $sum+=$item->price; ?>
        @endforeach
    <h4>Att betala: {{$sum}} SEK.</h4>
    </p>
    
    <p>
        {{link_to('/kassa/empty','Töm checkout')}}.
    </p>

    <div class="row">
        @foreach ($cart as $item)
        <span class="glyphicon glyphicon-shopping-cart"></span> {{$item->name}}<br />

        @endforeach
        </div>
    <br />
    <button type="button" class="btn btn-default btn-lg">
        Kort
    </button>
    <button type="button" class="btn btn-default btn-lg">
        Kontant
    </button>
    
    <br />
    
@endif

@stop