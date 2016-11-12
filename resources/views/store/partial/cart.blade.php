@extends('store.store')

@section('content')
	
<section id="cart_items" ng-app="carrinho">
	<div class="container">
		<div class="table-reponsive cart_info">
			
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Descrição</td>
						<td class="price">Valor</td>
						<td class="price">Quantidade</td>
						<td class="price">Total</td>
						<td></td>
					</tr>
				</thead>

				<tbody ng-controller="CarrinhoController">

					<tr ng-repeat="(k, item) in itens">
						<td class="cart_product">
							<a ng-href="/store/produto/@{{k}}">
								Imagem <br>
								<img ng-init="" ng-src="" width="100">
							</a>
						</td>

						<td class="cart_description">
							<h4><a ng-href="/store/produto/@{{k}}">@{{item.nome}}</a></h4>
							<p>Código: @{{ k }}</p>
						</td>

						<td class="cart_price">
							R$ @{{ item.valor }}
						</td>

						<td class="cart_quantity">
							<div class="form-group col-sm-3">
								<input type="number" ng-click="somar(item, k)" min="0" class="form-control" ng-model="item.quantidade" name="input" ng-change="getTotal()">
							</div>
						</td>

						<td class="cart_total">
							<p class="cart_total_price"> R$ @{{ item.valor * item.quantidade}}</p>
						</td>

						<td class="cart_delete">
							<a href="" ng-click="delete(k)" class="cart_quantity_delete">Delete</a>
						</td>

					</tr>
					
					<tr ng-hide="vazio">
						<td class="" colspan="6">
							<p>Nenhum item encontrado.</p>
						</td>
					</tr>
					
					<tr class="cart_menu">
						<td colspan="6">
							<div class="pull-right">
								<span style="margin-right: 100px">
									TOTAL: R$ @{{total}}
								</span>

								<a href="{{route('checkout.place')}}" class="btn btn-success">Fechar a conta</a>
							</div>
						</td>
					</tr>
					
				</tbody>

			</table>
		</div>
	</div>
</section>

@stop