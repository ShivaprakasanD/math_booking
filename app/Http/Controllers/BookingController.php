<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function showAvailableClasses()
    {
        
        $classrooms = Classroom::with('timetables')->get();
        $response = ['status'=> true,'classroomslist' =>  $classrooms,'message'=> __('Classroom not found')]; // lang file
        return response()->json($response, Response::HTTP_OK);          
    }

    public function bookClass(Request $request)
    {
       

        $classroom = Classroom::where('name', $request->classroom)->first();
        if (!$classroom) {            
            $response = ['status'=> true, 'message'=> __('Classroom not found')]; 
            return response()->json($response, Response::HTTP_NOT_FOUND);            
        }

        $startTime = Carbon::parse($request->slot);
        $endTime = $startTime->copy()->addHour();

        $existingBookings = Booking::where('classroom_id', $classroom->id)
            ->where('start_time', $startTime)
            ->count();

        if ($existingBookings >= $classroom->capacity) {
            
            $response = ['status'=> true, 'message'=> __('Classroom is fully booked at this time')]; 
            return response()->json($response, Response::HTTP_OK);            
        }

        Booking::create([
            'classroom_id' => $classroom->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
        $response = ['status'=> true, 'message'=> __('Booking created successfully')]; 
        return response()->json($response, Response::HTTP_OK);          
    }    

    public function cancelBooking(Request $request)
    {
        

        $classroom = Classroom::where('name', $request->classroom)->first();
        if (!$classroom) {
            $response = ['status'=> true, 'message'=> __('Classroom not found')]; 
            return response()->json($response, Response::HTTP_NOT_FOUND);    
        }

        $startTime = Carbon::parse($request->slot);
        $now = Carbon::now();

        if ($now->diffInHours($startTime) < 24) {
            $response = ['status'=> true, 'message'=> __('Cannot cancel booking less than 24 hours in advance')]; 
            return response()->json($response, Response::HTTP_OK);              
        }

        $booking = Booking::where('classroom_id', $classroom->id)
            ->where('start_time', $startTime)
            ->first();

        if (!$booking) {            
            $response = ['status'=> true, 'message'=> __('Booking not found')]; 
            return response()->json($response, Response::HTTP_NOT_FOUND); 
        }

        $booking->delete();        
        $response = ['status'=> true, 'message'=> __('Booking canceled successfully')]; 
        return response()->json($response, Response::HTTP_OK); 
    }
}
