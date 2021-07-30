<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item, $id)
    {
        $storedItem = ['Qty' => 0, 'Item' => $item, 'price' => $item->price];
        if ($this->items)
            if (array_key_exists($id, $this->items))
                $storedItem = $this->items[$id];

        $storedItem['Qty']++;
        $storedItem['price'] = $item->price * $storedItem['Qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    public function reductByOne($id)
    {
        $this->items[$id]['Qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['Item']['price'];
        $this->totalPrice -= $this->items[$id]['Item']['price'];
        $this->totalQty--;
        if ($this->items[$id]['Qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    public function removeItem($id)
    {
        $this->totalPrice -= $this->items[$id]['price'];
        $this->totalQty -= $this->items[$id]['Qty'];
        unset($this->items[$id]);
    }
}
