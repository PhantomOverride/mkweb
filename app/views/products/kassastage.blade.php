@extends('v1-wrapper')

@section('title')
    Kassa
@stop

@section('contentname')
    Kassa
@stop

@section('contenttitle')
    Redo för köp?
@stop

@section('content')
@if ($cart != null)
    <h3>Checkout</h3>
    <p>
        <?php $sum=0;?>
        @foreach ($cart as $item)
            <?php $sum+=$item->price; ?>
        @endforeach
    <h4>Betalas med {{$method}}: {{$sum}} SEK.</h4>
    </p>
    

    <div class="row">
        @foreach ($cart as $item)
        <span class="glyphicon glyphicon-shopping-cart"></span> {{$item->name}}<br />

        @endforeach
        </div>
    <br />
    <button onclick="document.location='/kassa/purchase';" type="button" class="btn btn-default btn-lg">
        Bekräfta
    </button>
    <br />
    <br />
    <button onclick="document.location='/kassa/empty';" type="button" class="btn btn-default btn-lg">
        Annulera köp
    </button>
    
    <br />
@endif

@stop