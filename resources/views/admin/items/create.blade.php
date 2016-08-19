@extends('admin.main')
@section('content')
<form method="POST" action="{{action('ItemsController@store')}}"/>
Наименование запчасти<br>
<input type="text" name="title"/><br>
Группа<br>

<select name="group_id">
    <option value="">Выбрать</option>
@foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->title}}</option>
@endforeach
</select>
<br>
Производитель<br>

<select name="manufacturer_id">
    <option value="">Выбрать</option>
    @foreach($manufacturers as $manufacturer)
        <option value="{{$manufacturer->id}}">{{$manufacturer->title}}</option>
@endforeach
</select><br>
Вес<br>
<input type="text" name="weight" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/><br>
Стоимость<br>
<input type="text" name="cost" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/><br>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
<div>
    <a href="/adminzone/items">Все запчасти</a>
</div>
@include('common.errors')

@endsection