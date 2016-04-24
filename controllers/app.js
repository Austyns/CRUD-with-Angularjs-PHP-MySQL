
  var app =  angular.module("ToDo",['ngRoute']); 



	app.run(function($rootScope){

	  $rootScope.BaseServer = 'http://localhost/class1' ;
	   //to absolute path to project folder
	});

	
    app.config( ['$routeProvider', function($routeProvider) {

            $routeProvider
                .when('/', {
                    title: 'Welcome Page',
                    templateUrl: 'views/home.php'
                    // controller : 'Required-Ctrl' 
                })

                .otherwise({
                    redirectTo: '/'
                });
                
  }]);
