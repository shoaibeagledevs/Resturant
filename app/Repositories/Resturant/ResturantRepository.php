<?php
namespace App\Repositories\Resturant;

use App\Http\Requests\Resturant\CreateResturant;
use App\Interfaces\Resturant\ResturantInterface;
use App\Traits\ResponseAPI;
use App\Models\Resturant;
use DB;

class ResturantRepository implements ResturantInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllResturants()
    {
        try {
            $resturants = Resturant::all();
            return $this->success("All Resturants", $resturants);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createResturant(CreateResturant $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If resturant exists when we find it
            // Then update the resturant
            // Else create the new one.
            $resturant = $id ? Resturant::find($id) : new Resturant;

            // Check the resturant 
            if($id && !$resturant) return $this->error("No resturant with ID $id", 404);

            $resturant->name = $request->name;

            // Save the resturant
            $resturant->save();

            DB::commit();
            return $this->success(
                $id ? "Resturant updated"
                    : "Resturant created",
                $resturant, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}