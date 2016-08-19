@extends('admin.main')
@section('content')

@if (count($items) > 0)
<table>
<tr>
    <td>id</td>
    <td>Название</td>
    <td>Действие</td>
    <td>Действие</td>
</tr>
@foreach ($items as $item)
<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->title}}</td>
    <td> <a href="{{action('ItemsController@edit',['item'=>$item->id])}}">Изменить</a></td>
    <td>
        <form action="{{action('ItemsController@destroy',['item'=>$item->id])}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button>Удалить задачу</button>
        </form></td>
    <td>
</tr>
@endforeach
</table>
@else
<div>Нет элементов</div>
@endif
@if(Session::has('message'))
{{Session::get('message')}}
@endif
<div>
    <a href="/adminzone/items/create">Добавить запчасть</a>
</div>

@endsection