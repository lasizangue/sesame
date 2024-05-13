
<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield("titre-auth")</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class=" hold-transition login-page bg-primary" style=" transform: translateY(-80px);">
   
</div> 
        
    <div class="container-fluid">
        
        <div class="d-flex justify-content-center ">
           
                @yield('form')
                
        </div>
    </div>
    
</body>
</html>
