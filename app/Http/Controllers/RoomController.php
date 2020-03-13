<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoomrequest;

use App\Http\Requests\UpdateRoomrequest;

use App\Models\Room;

use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{

public function CreateRoom(AddRoomrequest $request){

    $CreateRoom= new Room();

    $CreateRoom->hotel_id=$request->hotel_id;

    $CreateRoom->type=$request->type;

    $CreateRoom->description=$request->description;

    $CreateRoom->price=$request->price;

    $CreateRoom->save();

    return response()->json($CreateRoom);



}

public function UpdateRoom(UpdateRoomrequest $request , $id){

    $UpdateRoom=Room::find($id);

    $UpdateRoom->hotel_id=$request->hotel_id;

    $UpdateRoom->type=$request->type;

    $UpdateRoom->description=$request->description;

    $UpdateRoom->price=$request->price;

    $UpdateRoom->save();

    return response()->json('Room Updated Successfully');

}



public function ShowRoom(){

 $ShowRoom=DB::table('rooms')

 ->join('hotels' ,'rooms.hotel_id' ,'hotels.id')->get();

 return response()->join($ShowRoom);
}

}
