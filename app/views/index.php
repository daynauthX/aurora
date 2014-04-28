<!DOCTYPE html>
<html>
    <head>
        <title>Aurora</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- css -->
        <link rel ="stylesheet" href="packages/bootstrap/css/bootstrap.min.css" />
        
    </head>
    <body ng-app = "bakeryApp">
        <nav class ="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand">Bakery</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/#/standingorders">Standing Orders</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
                    
            </div>
        </nav>
        
        
        <div class="container" ng-view="">

        </div>
        
        
        
        
        <script src="js/angular.min.js"></script>
        <script src="js/angular-route.min.js"></script>
        <script src="js/angular-resource.min.js"></script>
        <script src="js/lodash.min.js"></script>
        <script src="js/restangular.min.js"></script>
        <script src="js/ui-bootstrap-0.10.0.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/controllers/LoginController.js"></script>
        <script src="js/controllers/HelloController.js"></script>
        <script src="js/controllers/StandingOrdersController.js"></script>
        <script src="js/controllers/testController.js"></script>
        
        <script src="js/services/auth.js"></script>
        <script src="js/services/search.js"></script>
        
        <script src="js/directives/cu-focus.js"></script>
        <script src="js/directives/ng-enter.js"></script>
        
    </body>
</html>
