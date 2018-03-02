
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>PublicityNepal | Nepal's Number 1 news portal</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div id="main">
  </div>
  <script>
   window.Laravel = <?php echo json_encode([
     'csrfToken' => csrf_token(),
     ]); ?>
   </script>
   <script src="{{asset('js/app.js')}}"></script>
   <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Khula" rel="stylesheet"> 
 </body>
 </html>