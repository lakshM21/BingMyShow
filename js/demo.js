'use strict';

//<!--creating a angularjs app-->
var app = angular.module('vmovies', []);
//creating a controller for importing json data and adding/copulating json data to the controller via looping

app.controller('searchCtrl', function($rootScope, $scope, $http){
    $scope.isSearched = false;
    console.log($scope.isSearched);
    $scope.onSearch = function(){
        $scope.isSearched = true;
        console.log('True from searchCtrl');
        console.log($scope.isSearched);
        var isSearching = $scope.isSearched;
        $rootScope.$broadcast('searchOptionCtrl', isSearching);
        console.log($scope.search);
    }
    
});

app.controller('movies1Ctrl', function($rootScope, $scope, $http){

    $scope.isSearched = false;
    $scope.$on('searchOptionCtrl', function(event, value){
        $scope.isSearched = value;
        console.log('True from movies1Ctrl');
        console.log($scope.isSearched);
    })

    //getting data locally through http get request
    $http.get('./data/movies1.json').then(function(data) {
        //extracting and assigning json data received from get request to scope variable 
        $scope.movies1 = data.data;
        //extracting movie card data as per their slides in seperate 
        $scope.slide1 = $scope.movies1.Slide1;
        $scope.slide2 = $scope.movies1.Slide2;
        $scope.slide3 = $scope.movies1.Slide3;
    });

    console.log($scope.search);

    $scope.addToWishlist = function(obj){
        var queryString = "?" + obj.title + "&" + obj.imageSrc;
        window.location.href = "watchlist.html" + queryString;
       console.log(obj);
    }
});
app.controller('movies2Ctrl', function($rootScope, $scope, $http){

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
});