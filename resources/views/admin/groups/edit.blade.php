@extends('admin.main')
@section('content')
<form method="POST" action="{{action('GroupsController@update',['groups'=>$group->id])}}">
<input type="hidden" name="_method" value="put">

Группа:<br>
<input type="text" name="title" value="{{$group->title}}"><br>

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="submit" value="Сохранить">
</form>

@if(Session::has('message'))
{{Session::get('message')}}
@endif
<div>
    <a href="/adminzone/groups/">Все группы</a>
</div>
@endsection