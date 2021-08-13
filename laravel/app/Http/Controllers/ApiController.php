<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{

    protected $itemRepository;
    protected $priceCalculator;

    public function __construct(ItemRepository $itemRepository, PriceCalculator $priceCalculator)
    {
        $this->itemRepository = $itemRepository;
        $this->priceCalculator = $priceCalculator;
    }



}
