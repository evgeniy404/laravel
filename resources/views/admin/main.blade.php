<!DOCTYPE html>
<html>
<head>
<meta charaset="utf-8"/>
<title>Админка</title>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<script src="{{asset('js/valid.js')}}"></script>
</head> 
<body> 
<div id="header">
    <div><a href="/adminzone">Главная</a></div>
 <div id="content">@yield('content')</div>
 </body>
</html>