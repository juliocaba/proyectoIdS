<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Parzibyte">
    <title>@yield("titulo") - {{env("APP_NAME")}}</title>
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
   
    <style type="text/css"> BODY{ font-family: cambria; } </style>
    
    <h1 style="text-align: center; font-size: 60px" >PERRITOS FELICES</h1>
 
</head>
<body>

<main class="container-fluid">
    @yield("contenido")
</main>



</body>
</html>