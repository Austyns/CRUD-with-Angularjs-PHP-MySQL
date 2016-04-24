//Kindly define your controllers+ here. Example below...

// Example 

  app.controller('AddTodoCtrl', function($scope, $rootScope, $http, $window, $location){
      // $rootScope.appState = "whatever" ;

        // initialize Input params ($_POST array)

        $scope.task = {} ;

          $scope.AddTodo = function() {
        // Posting data to php file
        // alert($scope.user) ;
        $http({
          method  : 'POST',
          url     : 'models/api.php?action=add',
          data    : $scope.task, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
              $scope.errortask_name = data.errors.task_name ;
              $scope.errordue_date = data.errors.due_date ;

            }  else {
              $scope.message = data.message ;

               // Force Reload on changing state

              alert("Successfully Added ") ;

              $window.location.href = "#/" ;

              // $route.reload();
            }
          });
        };

     });


    app.controller('ViewToDoCtrl', function($scope, $http, $location, $route, $window, $rootScope) {
      // var BaseServer = 'http://localhost/portal/' ;
      // $rootScope.appState = 'clients' ;


        // initialize Input params ($_POST array)
        $scope.key = {} ;

//  Change Task status on completion 

        $scope.ChangeStatus = function(key) {
        // Posting data to php file
        // alert($scope.key) ;
        console.log(key) ;

        $http({
          method  : 'PUT',
          url     : 'models/api.php?action=update',
          data    : key , //forms  object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
              // $scope.errortask_name = data.errors.task_name ;

            }  else {
              $scope.message = data.message ;

               // Force Reload on changing state

              alert("Successfully Updated ") ;

              // close the modal

              $('#m'+key).modal('hide') ;

              // force reload
              $window.location.reload(3000); 

              //  An alternative method
              // $route.reload(); 
              // $window.location.href = "#/" ;

            }
          });
        };

      // Delete Task 

        $scope.DeleteTask = function(key) {
        // Posting data to php file

        // console.log(key) ;

        $http({
          method  : 'DELETE',
          url     : 'models/api.php?action=delete',
          data    : key , //forms  object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
            }  else {
              $scope.message = data.message ;

               // Force Reload on changing state

              alert("Successfully Deleted ") ;

              // close the modal

              $('#m'+key).modal('hide') ;

              // force reload
              $window.location.reload(3000); 

              //  An alternative method
              // $route.reload(); 
              // $window.location.href = "#/" ;

            }
          });
        };
      // var who = $scope.usernum ;

       $http.get("models/api.php?obj=GetTodo")
        .success(function(response) {

          $scope.todos = {};
          $scope.todos.td = response.data ; 

        });
      
     
          
     });

