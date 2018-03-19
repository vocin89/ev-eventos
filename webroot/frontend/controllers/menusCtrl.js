app.controller("menusCtrlIndex", function ($scope,DTOptionsBuilder, DTColumnBuilder,ngDialog) {
    var vm = this;
    vm.escuelas = {};

    // define table
    vm.dtOptions = DTOptionsBuilder.fromSource('escuelas.json')
    				.withDataProp('response')
    				 .withDOM('frtp')
    				 .withBootstrap();

    vm.newSource = 'escuelas.json';
    vm.reloadData = reloadData;
    vm.dtInstance = {};
    vm.escuelas = {};

    vm.dtColumns = [
        
        DTColumnBuilder.newColumn('nombre','Nombre'),
        DTColumnBuilder.newColumn(null,'Acciones').notSortable()
            .renderWith(actionsHtml).withClass('text-center')
        
    ];

    function reloadData() {
        var resetPaging = false;
        vm.dtInstance.reloadData(callback, resetPaging);
    }

    function callback(json) {
        console.log(json);
    }				
    

    // acciones html
    function actionsHtml(data, type, full, meta) {
        vm.escuelas[data.id] = data;
        return '<button class="btn btn-primary btn-sm" ng-click="showCase.edit(showCase.escuelas[' + data.id + '])">' +
            '   <i class="fa fa-edit"></i>' +
            '</button>&nbsp;' +
            '<button class="btn btn-primary btn-sm" ng-click="showCase.delete(showCase.escuelas[' + data.id + '])" )"="">' +
            '   <i class="fa fa-trash-o"></i>' +
            '</button>';
    }				 
    				
    // functions
    $scope.clickToOpen = function () {
    	console.log('ok');
        ngDialog.open({ template: 'webroot/frontend/templates/escuelas/add.html', 
        				className: 'ngdialog-theme-default',
        				preCloseCallback: function(response){

        					vm.reloadData();

        				} });
    };
	

});

app.controller("menusCtrlAdd", function ($scope,DTOptionsBuilder, DTColumnBuilder,ngDialog,$http) {
    
    $scope.submit_add  = function(){ 
	    console.log($scope.data);
	    $http({
	        method : "POST",
	        url : "escuelas.json",
	        data: $scope.data
	    }).then(function mySuccess(response) {

	        if(response.data.response.status=="OK"){
	        	$scope.closeThisDialog(response.data.response.body);
	        }else{
	        	alert('Se produjo un error por favor intentelo nuevamente.');
	        }

	    }, function myError(response) {
	        alert('Se produjo un error por favor intentelo nuevamente.');
	    });
	}

});