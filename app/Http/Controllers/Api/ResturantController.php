<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resturant;
use DB;
use App\Interfaces\Resturant\ResturantInterface;
use App\Http\Requests\Resturant\CreateResturant;


class ResturantController extends Controller
{
	protected $resturantInterface;


	public function __construct(ResturantInterface $resturantInterface)
    {
        $this->resturantInterface = $resturantInterface;
    }


    public function index()
    {
         // Returning all resturants
        return $this->resturantInterface->getAllResturants();
    }



    public function store(CreateResturant $request)
    {
        return $this->resturantInterface->createResturant($request);
    }
    
}
