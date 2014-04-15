<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Authentication App With Laravel 4</title>
    {{HTML::style('packages/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('css/main.css')}}
    
  </head>
 
  <body>
      
      <div class="navbar navbar-fixed-top">
          <div class ="navbar-inner">
              <div id ="container">
                  <ul>
                      <li>{{HTML::link('users/login', 'Login')}}</li>
                  </ul>
              </div>
          </div>
      </div>
 
  </body>
</html>