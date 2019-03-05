<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/v4-shims.css">
 <link href="https://fonts.googleapis.com/css?family=Aldrich|Bangers|Monoton|Jura" rel="stylesheet">
	  <title>@yield('title')</title>
</head>
<body>

  @yield('header')


@yield('nav')

@yield('content')

</body>
</html>
