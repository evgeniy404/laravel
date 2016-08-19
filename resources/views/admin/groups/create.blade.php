@extends('admin.main')

@section('content')

<form method="POST" action="{{action('GroupsController@store')}}">

Наименование группы:<br>

<input type="text" name="title"><br>

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