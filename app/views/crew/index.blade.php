@extends('v1-wrapper')

@section('title')
    CREW
@stop

@section('contentname')
    CREW
@stop

@section('contenttitle')
    Dags för underhåll?
@stop

@section('content')
<!-- Page edit section -->

<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>Content Management</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Urlname</td>
            <td>Name</td>
            <td>Parentname</td>
            <td>Order</td>
            <td>Linkto</td>
            <td>Edit</td>
    </tr>
</thead><tbody>
    
    @foreach($pages as $page)
        <tr>
            <td>{{$page->urlname}}</td>
            <td>{{$page->name}}</td>
            <td>{{$page->parentname or 'NULL'}}</td>
            <td>{{$page->order}}</td>
            <td>{{$page->linkto or 'NULL'}}</td>
            <td>{{link_to(($page->parentname==null)?'/crew/pageedit/'.$page->urlname:'/crew/pageedit/'.$page->parentname.'/'.$page->urlname,'Redigera')}}</td>
        </tr>
    @endforeach
</tbody>
</table>
</div>

@stop