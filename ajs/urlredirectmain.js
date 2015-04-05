angular.module('Adminsgde', ['ngRoute'])
.config(function($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'form/for_index/for_index.php'
      })
        .otherwise({
        redirectTo: '/'
      });
  })
