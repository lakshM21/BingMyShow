angular.module('vmovies').controller('movies2Ctrl', [ '$rootScope','$scope','$http', function($rootScope, $scope, $http){

    $scope.isSearched = false;
    $scope.$on('searchOptionCtrl', function(event, value){
        $scope.isSearched = value;
        console.log('True from movies2Ctrl');
        console.log($scope.isSearched);
    })

    //getting data locally through http get request
    $http.get('./data/movies2.json').then(function(data) {
        //extracting and assigning json data received from get request to scope variable 
        $scope.movies2 = data.data;
        //extracting movie card data as per their slides in seperate 
        $scope.slide1 = $scope.movies2.Slide1;
        $scope.slide2 = $scope.movies2.Slide2;
        $scope.slide3 = $scope.movies2.Slide3;
    });

    $scope.addToWishlist = function(obj){
        var queryString = "?" + obj.title + "&" + obj.imageSrc;
        window.location.href = "watchlist.html" + queryString;
       console.log(obj);
   }
}]);