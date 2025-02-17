<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>

<div class="jumbotron text-center">
  <h1>User Dash Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
    <!-- @if(Auth::user()->role == 'user')
     <div class="alert alert-danger">
        <strong>Sorry!</strong> You are not allowed to access this page.        
    </div> 
     @endif -->
    
                <h1>Welcome</h1>
                @if(Auth::check())
                <p>Welcome {{Auth::user()->name}}</p>
                <a href="{{ url('/logoutuser')}}" class="btn btn-danger">Logout</a>
                @endif
    
    

</div>

</body>
</html>
