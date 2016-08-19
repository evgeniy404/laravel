@extends('admin.main')
@section('content')
<form method="POST" action="{{action('ManufacturersController@store')}}" onsubmit="return valid(this);"/>
Производитель<br>
<input type="text" name="title" data-not-empty/><br>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
<div>
    <a href="/adminzone/manufacturers">Все производители</a>
</div>
@include('common.errors')
@endsection