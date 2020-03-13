<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateHotelRequest;

use App\Http\Requests\UpdateHotelRequest;

use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function createHotel(CreateHotelRequest $request){

        $createHotel=new Hotel();

        $createHotel->name=$request->name;

        $createHotel->description=$request->description;

        $createHotel->location=$request->location;


        $createHotel->save();

        return response()->json($createHotel);

    }


    public function UpdateHotel(UpdateHotelRequest $request , $id){

        $UpdateHotel = Hotel::find($id);

        $UpdateHotel->name=$request->name;

        $UpdateHotel->description=$request->description;

        $UpdateHotel->location=$request->location;

        $UpdateHotel->save();

        return response()->json("Updated Successfully");

    }

     public function deleteHotel($id){

        $deleteHotel = Hotel::find($id);

        $deleteHotel->delete();

        return response()->json("deleted succesfully");
    }

    public function showHotel(){

        $showhotel=DB::table('hotels')->get();

        return response()->json($showhotel);
    }
}
