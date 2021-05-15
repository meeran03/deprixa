var app = angular.module('app', []);
app.controller('memberdata', function($scope, $http){
	$scope.success = false;
    $scope.error = false;
  
    $scope.fetch = function(){
    	$http.get("assets/add_container/fetch.php").success(function(data){ 
	        $scope.members = data; 
	    });
    }
	
	
	 $scope.toggleAll = function(){
        for (var i = 0; i < $scope.members.length; i++) {
            $scope.members[i].Selected = $scope.checkAll;
        }
    };
 
    $scope.toggleOne = function(){
        $scope.checkAll = true;
        for (var i = 0; i < $scope.members.length; i++) {
            if (!$scope.members[i].Selected) {
                $scope.checkAll = false;
                break;
            }
        };
    };
 
    $scope.deleteAll = function(){
        checkedId = [];
        for (var i = 0; i < $scope.members.length; i++) {
            if ($scope.members[i].Selected) {
                checkedId.push($scope.members[i].id);
            }
        }
        $http.post("assets/add_container/delete.php", checkedId)
        .success(function(data){ 
            console.log(data);
            if(data.error){
                $scope.error = true;
                $scope.success = false;
                $scope.errorMessage = data.message;
                $scope.checkAll = false;
            }
            else{
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = data.message;
                $scope.fetch();
                $scope.checkAll = false;
            } 
        });
    }
 
    $scope.clearMessage = function(){
    	$scope.success = false;
    	$scope.error = false;
    }


    $scope.memberfields = [{id: 'field1'}];

    $scope.newfield = function(){
        var newItem = $scope.memberfields.length+1;
        $scope.memberfields.push({'id':'field'+newItem});
    }

    $scope.submitForm = function(){
        $http.post('assets/add_container/add.php', $scope.memberfields)
        .success(function(data){
            if(data.error){
                $scope.error = true;
                $scope.success = false;
                $scope.errorMessage = data.message;
            }
            else{
                $scope.error = false;
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetch();
                $scope.memberfields = [{id: 'field1'}];
            }
        });
    }

    $scope.removeField = function() {
        var lastItem = $scope.memberfields.length-1;
        $scope.memberfields.splice(lastItem);
    };

    $scope.clearMessage = function(){
    	$scope.success = false;
    	$scope.error = false;
    }

});

!function ($) {

  $(function(){

    var $window = $(window)

    $('.button-loading')
      .click(function () {
        var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
          btn.button('reset')
        }, 3000)
      })
  })


}(window.jQuery)