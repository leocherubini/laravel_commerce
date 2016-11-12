<?php

namespace CodeCommerce;

use CodeCommerce\Product;

class Cart
{

	private $items;

	public function __construct()
	{
		$this->items = [];
	}

	public function add($id, $name, $price)
	{
		$this->items += [
			$id => [
				'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
				'price' => $price,
				'name' => $name
			]
		];

	}

	public function remove($id)
	{
		unset($this->items[$id]);
	}

	public function setQuantidade($id, $quantidade)
    {
        $this->items[$id]['qtd'] = (int) $quantidade;
    }

    public function all()
    {
        return $this->items;
    }

	public function getTotal()
	{
		$total = 0;
		foreach($this->items as $items) {
			$total += $items['qtd'] * $items['price'];
		} 

		return $total;
	}

	public function clear()
    {
        $this->items = [];
    }

    // public function imagem($id)
    // {
    //     $produto = Product::find($id);

    //     if(!$produto->imagens->isEmpty()) {
    //         return $produto->imagens->first()->caminho;
    //     } else {
    //         return url('images/no-img.jpg');
    //     }
    // }

}