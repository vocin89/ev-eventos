app.controller("eventosCtrlIndex", function ($scope,DTOptionsBuilder, DTColumnBuilder,$filter,ngDialog) {
    var vm = this;
    vm.eventos = {};

    // define table
    vm.dtOptions = DTOptionsBuilder.fromSource('eventos.json')
    				
                    .withDOM('frtp')
                    .withDataProp('response')
    				.withBootstrap();
                     

    vm.newSource = 'eventos.json';
    vm.reloadData = reloadData;
    vm.dtInstance = {};
    vm.eventos = {};

    vm.dtColumns = [
        
        DTColumnBuilder.newColumn('eventos.nombre','Nombre').withClass('text-center'),
        DTColumnBuilder.newColumn('tipo_eventos.nombre','Tipo').withClass('text-center'),
        DTColumnBuilder.newColumn('escuelas.nombre','Escuela').withClass('text-center'),
        DTColumnBuilder.newColumn('eventos.fecha','Fecha').renderWith(function(data, type) {
                                return $filter('date')(data, 'dd/MM/yyyy'); //date filter
                                }).withClass('text-center'),
        DTColumnBuilder.newColumn('eventos.horario','Horario').renderWith(function(data, type) {
                                
                                // var t = new Date('1970-01-01 '+data);
                                // var y = t.getHours()-3;

                                // t.setHours(y);
                                // return t.getHours()+':'+((t.getMinutes().length>1)?t.getMinutes():'0'+t.getMinutes()); //date filter
                                return data;
                                }).withClass('text-center'),

        DTColumnBuilder.newColumn('eventos.precio_adulto','Adulto').renderWith(function(data, type) {
                                        
                                return ((data)?'A definir':data);

                                }).withClass('text-center'),
        DTColumnBuilder.newColumn('eventos.precio_ninio','Niño').renderWith(function(data, type) {
                                        
                                return ((data==null)?'A definir':data);

                                }).withClass('text-center'),

        DTColumnBuilder.newColumn(null,'Acciones').notSortable()
            .renderWith(actionsHtml).withClass('text-center').withOption('width','100px')
        
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
        vm.eventos[data.id] = data;
        return '<button class="btn btn-primary btn-sm" ng-click="showCase.edit(showCase.eventos[' + data.id + '])">' +
            '   <i class="fa fa-edit"></i>' +
            '</button>&nbsp;' +
            '<button class="btn btn-primary btn-sm" ng-click="showCase.delete(showCase.eventos[' + data.id + '])" )"="">' +
            '   <i class="fa fa-trash-o"></i>' +
            '</button>&nbsp;'+
            '<button title="Definir precios" class="btn btn-danger btn-sm" ng-click="showCase.delete(showCase.eventos[' + data.id + '])" )"="">' +
            '   <i class="fa fa-dollar"></i>' +
            '</button>';
    }				 
    				
    // functions
    $scope.clickToOpen = function () {
        ngDialog.open({ template: 'webroot/frontend/templates/eventos/add.html', 
        				className: 'ngdialog-theme-default',
        				preCloseCallback: function(response){

        					vm.reloadData();

        				} });
    };
});

app.controller("eventosCtrlAdd", function ($scope,DTOptionsBuilder, DTColumnBuilder,ngDialog,$http) {
    
    $scope.submit_add  = function(){ 
        console.log('entra a este');
	    $http({
	        method : "POST",
	        url : "eventos.json",
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



    $scope.ini  = function(){
        $http({
            method : "GET",
            url : "escuelas.json",
        }).then(function mySuccess(response) {

            $scope.escuelas = response.data.response;

        }, function myError(response) {
            alert('Se produjo un error por favor intentelo nuevamente.');
        });
    }
});

app.controller("eventosCtrlList", function ($scope,DTOptionsBuilder, DTColumnBuilder,ngDialog,$http,$routeParams) {
    
    var vm = this;
    vm.dtOptions = DTOptionsBuilder.newOptions()                    
                                    .withDOM('frtp')
                                    .withOption('paging',false)
                                    .withBootstrap();
    $scope.nombre_evento = '';
    $scope.ini  = function(){
        $http({
            method : "GET",
            url : "eventos/list_a/"+$routeParams.id,
        }).then(function mySuccess(response) {
            console.log(response);
            
            $scope.alumnos = response.data.response;
            $scope.nombre_evento = 'Evento - '+$scope.alumnos[0].evento_nombre;

        }, function myError(response) {
            alert('Se produjo un error por favor intentelo nuevamente.');
        });
    }

    $scope.add_payment = function(alumno){
        ngDialog.open({ template: 'webroot/frontend/templates/entregas/add.html', 
                    className: 'ngdialog-theme-default',
                    data:alumno,
                    preCloseCallback: function(response){

                        // vm.reloadData();

                    } });

    }
});