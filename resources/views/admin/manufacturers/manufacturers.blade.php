@extends('admin.main')
@section('content')

@if (count($manufacturers) > 0)
<table>
<tr>
<td>id</td>
<td>Название</td>
<td>Действие</td>
<td>Действие</td>
</tr>
@foreach ($manufacturers as $manufacturer)
<tr>
    <td>{{$manufacturer->id}}</td>
<td>{{$manufacturer->title}}</td>
<td> <a href="{{action('ManufacturersController@edit',['manufacturer' => $manufacturer->id])}}">Изменить</a></td>
<td>
    <form action="{{action('ManufacturersController@destroy',['manufacturer' => $manufacturer->id])}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button>Удалить задачу</button>
    </form></td>
<td>
</tr>
@endforeach
</table>
@else
<div>Нет производителей</div>
@endif
<div>
    <a href="/adminzone/manufacturers/create">Добавить производителя</a>
</div>

@endsection