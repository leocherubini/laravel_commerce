angular.module('carrinho')
    .controller('CarrinhoController', ['$scope', '$http', function($scope, $http) {
    
    $scope.total = 0;
    $scope.item = {};
    $scope.id = 0;
    $scope.itens = [];
    $scope.vazio = false;
    $scope.imagem = '';
    
    $scope.getTotal = function() {
        $scope.total = 0;
        angular.forEach($scope.itens, function(value, key) {
          $scope.total += value.qtd * value.price;
        });
        //console.log($scope.total);
        return $scope.total;
    };

    $http.get('/api/itens/total')
    .success(function(retorno) {
        $scope.total = parseInt(retorno);
        
        //console.log($scope.total);
    })
    .error(function(erro) {
        console.log(erro);
    });

    $http.get('/api/itens')
    .success(function(retorno) {
        $scope.itens = retorno;
        //console.log(retorno);
        if(Object.keys($scope.itens).length > 0) {
            $scope.vazio = true;
        } else {
            $scope.vazio = false;
        }
    })
    .error(function(erro) {
        console.log(erro);
    });

    $scope.init = function(id) {
        $scope.id = id;
        $http.get('/api/item/'+$scope.id)
        .success(function(retorno) {
            $scope.item = retorno;
        })
        .error(function(erro) {
            //console.log(erro);
        });

        console.log($scope.id);
        //console.log($scope.item);
    };

    $scope.delete = function(id) {
        $http.delete('/api/item/delete/'+id)
        .success(function() {
            //console.log($scope.itens[id]);
            $scope.total -= $scope.itens[id].qtd *$scope.itens[id].price;
            delete $scope.itens[id];

            if(Object.keys($scope.itens).length === 0 && $scope.itens.constructor === Object) {
                $scope.total = 0;
            }
        })
        .error(function(erro) {
            //console.log(erro);
        });
    }

    $scope.somar = function(valor,id) {

        valor.id = id;
        //console.log(valor);

        $http({
        method: 'POST',
        url: '/api/itens/insere',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
        data: $.param(valor)
        })

            .success(function (response) {
               console.log(response);
            })
            .error(function(){
                console.log('false');
            });

    };
    
}]);