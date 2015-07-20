angular.module('Adminsgde', ['ngRoute'])
.config(function($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'form/for_login/for_login.php'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
