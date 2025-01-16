<?php

namespace App\Http\Controllers;

use App\Interfaces\flightRepositoryInterface;
use App\Interfaces\transactionRepositoryInterface;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    private flightRepositoryInterface $flightRepository;
    private transactionRepositoryInterface $transactionRepository;

    public function __construct(
        flightRepositoryInterface $flightRepository, 
        transactionRepositoryInterface $transactionRepository
        ) {
            $this->flightRepository = $flightRepository;
            $this->transactionRepository = $transactionRepository;
        }

        public function booking(Request $request, $flight_number)
        {
            // Panggil metode dari transactionRepository
            $this->transactionRepository->saveTransactionDataToSession($request->all());
        
            // Redirect ke halaman choose-seat
            return redirect()->route('booking.chooseseat', ['flight_number' => $flight_number]);
        }
        

    public function chooseseat(Request $request, $flight_number)
    {
        $transaction = $this->transactionRepository->gettransactionDataFromSession();
        $flight = $this->flightRepository->getflightByFlightNumber($flight_number);
        $tier = $flight->classes->find($transaction['flightclass_id']);

        return view('pages.booking.choose-seat', compact('transaction', 'flight', 'tier'));
    } 

    public function checkBooking() {
        return view('pages.booking.check_booking');
    }
}
