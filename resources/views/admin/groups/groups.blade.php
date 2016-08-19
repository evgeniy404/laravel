@extends('admin.main')
@section('content')
@if (count($groups) > 0)
<table>
<tr>
<td>id</td>
<td>Название</td>
<td>Действие</td>
<td>Действие</td>
</tr>
@foreach ($groups as $group)
<tr>
<td>{{$group->id}}</td>

<td>{{$group->title}}</td>
<td> <a href="{{action('GroupsController@edit',['group'=>$group->id])}}">Изменить</a></td>
<td> <form method="POST" action="{{action('GroupsController@destroy',['group'=>$group->id])}}">
<input type="hidden" name="_method" value="delete"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Удалить"/>
</form>
</td>
</tr>
@endforeach
</table>
@else
<div>Нет групп</div>
@endif
<div>
    <a href="/adminzone/groups/create">Добавить группу</a>
</div>
@if(Session::has('message'))
{{Session::get('message')}}
@endif
@endsection