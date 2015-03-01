@extends('v1-wrapper')

@section('title')
    Alla Produkter
@stop

@section('contentname')
    Alla Produkter
@stop

@section('contenttitle')
    Alla Produkter
@stop

@section('content')

<table class="table table-striped">
<thead>
    <tr>
            <td>Namn</td>
            <td>Pris</td>
            <td>Imageurl</td>
            <td>start</td>
            <td>stop</td>
            <td>type</td>
    </tr>
</thead><tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ link_to('/products/'.$product->id,$product->name) }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->imageurl }}</td>
            <td>{{ $product->start }}</td>
            <td>{{ $product->stop }}</td>
            <td>{{ $product->type }}</td>
        </tr>
    @endforeach
</tbody>
</table>


@stop