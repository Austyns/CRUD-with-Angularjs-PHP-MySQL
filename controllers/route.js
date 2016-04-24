
    app.config( ['$routeProvider', function($routeProvider) {

            $routeProvider
                .when('/', {
                    title: 'Welcome Page',
                    templateUrl: 'views/home.html',
                    controller : 'ViewToDoCtrl' 
                })

                .when('/add-task', {
                    title: 'Add Task',
                    templateUrl: 'views/add-todo.html',
                    controller : 'AddTodoCtrl' 
                })

                .otherwise({
                    redirectTo: '/'
                });
                
  }]);
