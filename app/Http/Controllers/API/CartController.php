<?php

namespace CodeCommerce\Http\Controllers\API;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeCommerce\Cart;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Product as Produto;

class CartController extends Controller
{

	/**
	 * @var Cart
	 */
	private $carrinho;

	public function __construct(Cart $carrinho)
	{
		$this->carrinho = $carrinho;
	}
    
    public function item($id)
    {
        $carrinho = $this->getCart();  
    
        return $carrinho->getItem($id);
    }

    public function itens()
    {
        $carrinho = $this->getCart();  

        return $carrinho->all();
    }

    public function insere(Request $request)
    {
        $id = $request->input('id');
        $quantidade = $request->input('qtd');
        $name = $request->input('name');
        $price = $request->input('price');
        // // // $id = $request->input('id');
        $carrinho = $this->getCart();
        $carrinho->setQuantidade($id, $quantidade);
        //$carrinho->setQuantidade($id, $quantidade);

        Session::set('carrinho', $carrinho);

        return $name;
    }

    public function imagem($id)
    {
        $produto = Produto::find($id);
        $image = '';
        if($produto->imagens->isEmpty()) {
            $imagem = public_path().'/images/no-img.jpg';
        } else {
            $imagem = $produto->imagens->first()->caminho;
        }

        return $imagem;
    }

    public function delete($id)
    {
        $carrinho = $this->getCart();

        $carrinho->remove($id);

        Session::set('cart', $carrinho);
    }

    public function total()
    {
        $carrinho = $this->getCart();

        return $carrinho->getTotal();
    }

    private function getCart()
    {
    	if(Session::has('cart')) {
    		$carrinho = Session::get('cart');
    	} else {
    		$carrinho = $this->carrinho;
    	}

    	return $carrinho;
    }

}
