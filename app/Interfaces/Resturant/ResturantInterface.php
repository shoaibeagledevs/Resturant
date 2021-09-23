<?php

namespace App\Interfaces\Resturant;

use App\Http\Requests\Resturant\CreateResturant;

interface ResturantInterface
{

	
    public function getAllResturants();

   
    public function createResturant(CreateResturant $request, $id = null);

   
}