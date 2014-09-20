@extends('v1-wrapper')

@section('title')
    Bloggarkiv
@stop

@section('contentname')
    Bloggarkiv
@stop

@section('contenttitle')
    Vad vill du läsa?
@stop

@section('content')

<table class="table table-striped">
<thead>
    <tr>
            <td>Artikel</td>
            <td>Skriven av</td>
            <td>Publicerat</td>
    </tr>
</thead><tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ link_to('/posts/'.$post->title,$post->title) }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->posted }}</td>
        </tr>
    @endforeach
</tbody>
</table>


@stop