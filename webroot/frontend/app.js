var app = angular.module("gestion-ev", ['ngRoute', 'datatables', 'datatables.bootstrap','ngDialog']);

var urlFrontend = "webroot/frontend/";
var urlFrontendTemp = urlFrontend+"templates/";
var urlFrontendCont = urlFrontend+"controller/";

app.config(function($routeProvider) {
    $routeProvider
    .when("/escuelas", {
        templateUrl : urlFrontendTemp+"escuelas/index.html"
    })
    .when("/eventos", {
        templateUrl : urlFrontendTemp+"eventos/index.html"
    })
    .when("/alumnos", {
        templateUrl : urlFrontendTemp+"alumnos/index.html"
    });

});


app.run(function(DTDefaultOptions) {
    DTDefaultOptions.setLanguage({
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en la tabla",
        "sLoadingRecords": "Cargando...",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primera",
            "sLast": "Ultima",
            "sNext": ">",
            "sPrevious": "<"
          },
    });    
});
