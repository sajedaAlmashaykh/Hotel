<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

use App\Http\Requests\AddReservationrequest;

use App\Http\Requests\UpdateReservationrequest;

use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function CreateReservation(AddReservationrequest $request){

        $CreateReservation=new Reservation();

        $CreateReservation->room_id=$request->room_id;

        $CreateReservation->num_of_guests=$request->num_of_guests;

        $CreateReservation->arrival=$request->arrival;

        $CreateReservation->departure=$request->departure;

        $CreateReservation->name_of_guests=$request->name_of_guests;

        $CreateReservation->phone_number_of_guests=$request->phone_number_of_guests;

        $CreateReservation->loction_of_guests=$request->loction_of_guests;

        $CreateReservation->save();

        return response()->json($CreateReservation);

    }


    public function EditReservation(UpdateReservationrequest $request ,$id){

        $UpdateReservationrequest=Reservation::find($id);

        $UpdateReservationrequest->room_id=$request->room_id;

        $UpdateReservationrequest->num_of_guests=$request->num_of_guests;

        $UpdateReservationrequest->arrival=$request->arrival;

        $UpdateReservationrequest->departure=$request->departure;

        $UpdateReservationrequest->name_of_guests=$request->name_of_guests;

        $UpdateReservationrequest->phone_number_of_guests=$request->phone_number_of_guests;

        $UpdateReservationrequest->loction_of_guests=$request->loction_of_guests;



        $UpdateReservationrequest->save();

        return response()->json("updated Successfully Reservation ");

    }

    public function DeleteReservation($id){

        try{
        $DeleteReservation=Reservation::find($id);

        $DeleteReservation->delete();

        return response()->json(" Reservation  is deleted  ");
        }catch(QueryException $e){

        if ($e->getCode() == 23000) {
            return $this->errorResponse('You Can Not Delete  Because  have Reservation' , 409);
        }

        }


    }

    public function ShowReservation(){

      $ShowReservation=DB::table('reservations')

      ->join('rooms' ,'rooms.id' ,'reservations.room_id')

      ->join('hotels','rooms.hotel_id' ,'hotels.id')

      ->select(

      'hotels.name',
      'hotels.location',
      'hotels.description As Hotel Description ',

      'rooms.type',
      'rooms.description As Room Description' ,
      'rooms.price',

      'reservations.num_of_guests As number_of_guests' ,
      'reservations.arrival',
      'reservations.departure',
      'reservations.name_of_guests As Name' ,
      'reservations.phone_number_of_guests As Phone' ,
      'reservations.loction_of_guests As location'
      )->get();


       return response()->json($ShowReservation);

    }

}
