<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingDetail;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
    public function saveBooking() {
        $hasError = false;

        try {
            $arrServices = Input::get('services');
            $staff = Input::get('staff');
            $event_date_time = Input::get('event_date_time');
            $firstname = Input::get('firstname');
            $lastname = Input::get('lastname');
            $gender = Input::get('gender');
            $mobile = Input::get('mobile');
            $email = Input::get('email');
            $note = Input::get('note');

            $booking_data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'gender' => $gender,
                'email' => $email,
                'mobile' => $mobile,
                'note' => $note,
                'event_date_time' => new \DateTime($event_date_time, null),
                'status_id' => 1        // tentative as default
            ];

            //return json_encode($booking_data);

            $booking = Booking::create($booking_data);
            $booking_id = $booking->id;

            foreach($arrServices as $service_id) {
                $booking_detail_data = [
                    'booking_id' => $booking_id,
                    'service_id' => $service_id,
                    'staff_id' => $staff
                ];

                BookingDetail::create($booking_detail_data);
            }
        } catch(\Exception $ex) {
            $hasError = true;
        }

        return $hasError ? "has_error":"no_error";
    }

    public function confirmBooking() {
        $hasError = false;

        try {
            $id = Input::get('id');
            $status_id = Input::get('status_id');

            $booking = Booking::find($id);
            $booking->status_id = $status_id;
            $booking->update();

        } catch(\Exception $ex) {
            $hasError = true;
        }

        return $hasError ? "has_error":"no_error";
    }

    public function rescheduleBooking() {
        $hasError = false;

        try {
            $id = Input::get('id');
            $event_date_time = Carbon::parse(Input::get('event_date_time'));

            $booking = Booking::find($id);
            $booking->event_date_time = $event_date_time;
            $booking->update();

        } catch(\Exception $ex) {
            $hasError = true;
        }

        return $hasError ? "has_error":"no_error";
    }
}
