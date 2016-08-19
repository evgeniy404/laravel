<!DOCTYPE html>
<html>
<head>
<meta charaset="utf-8"/>
<title>Сайт</title>
<style>
    .side {
        width: 300px; 
        float: left;
    }
    .side input[type=text] {
        width: 50px;
        margin: 10px;
    }
    .pagination li {
        display: inline;
        padding: 5px;
    }
    
</style>
</head> 
<body> 
<div id="header">
<div><a href="/adminzone/">Перейте к админке</a></div>
</div>
 <div id="content">
     <div style="width: 300px; float: left;" class="side">
        Поиск<br>
        <form method="GET" action="{{action('FrontController@index')}}"/>
        <div class="lab">Группа</div>
        <select name="group_id">
            <option value="">Выбрать</option>
            @foreach ($groups as $group)
                @if (isset($_GET['group_id']) && $_GET['group_id'] == $group->id)
                    <option value="{{$group->id}}" selected>{{$group->title}}</option>
                @else
                    <option value="{{$group->id}}">{{$group->title}}</option>
                @endif
            @endforeach
        </select>
        <br>
        <div class="lab">Стоимость</div>
        <input type="text" name="price_min" value="<?php if (isset($_GET['price_min'])) echo $_GET['price_min']; ?>" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/> 
        до <input type="text" name="price_max" value="<?php if (isset($_GET['price_max'])) echo $_GET['price_max']; ?>" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/> <br>
        <div class="lab">Вес</div>
        <input type="text" name="weight_min" value="<?php if (isset($_GET['weight_min'])) echo $_GET['weight_min']; ?>" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/> 
        до <input type="text" name="weight_max" value="<?php if (isset($_GET['weight_max'])) echo $_GET['weight_max']; ?>" onkeydown="javascript: return ((event.keyCode>47)&&(event.keyCode<58)) || (event.keyCode == 8) || (event.keyCode == 9)"/> <br>
        <div class="lab">Производитель</div>
        <select name="manufacturer_id">
            <option value="">Выбрать</option>
            @foreach ($manufacturers as $manufacturer) 
                @if (isset($_GET['manufacturer_id']) && $_GET['manufacturer_id'] == $manufacturer->id)
                    <option value="{{$manufacturer->id}}" selected>{{$manufacturer->title}}</option>
                @else
                    <option value="{{$manufacturer->id}}">{{$manufacturer->title}}</option>
                @endif
            @endforeach
        </select>
        <br>
        <input type="submit" value="Найти" name="btn"/>
        </form>

     </div>
     @yield('content')
 </div>
 </body>
</html>