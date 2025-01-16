<?php

namespace App\Http\Controllers;

use App\Interfaces\airportRepositoryInterface;
use App\Interfaces\flightRepositoryInterface;
use App\Interfaces\airlineRepositoryInterface;
use Illuminate\Http\Request;

    class FlightController extends Controller
    {
    private airportRepositoryInterface $airportRepository;
    private airlineRepositoryInterface $airlineRepository;
    private flightRepositoryInterface $flightRepository;

    public function __construct(
        airportRepositoryInterface $airportRepository,
        airlineRepositoryInterface $airlineRepository,
        flightRepositoryInterface $flightRepository
        )
    {
        $this->airportRepository = $airportRepository;
        $this->airlineRepository = $airlineRepository;
        $this->flightRepository = $flightRepository;
    }

    public function index(Request $request)
    {
        $departure = $this->airportRepository->getairportByIataCode($request->departure);
        $arrival = $this->airportRepository->getairportByIataCode($request->arrival);


    $flights = $this->flightRepository->getAllflight([
        'departure' => $departure->id ?? null,
        'arrival' => $arrival->id ?? null,
        'date' => $request->date ?? null,
    ]);

    $airlines = $this->airlineRepository->getAllairline();


    return view('pages.flight.index', compact('flights', 'airlines'));
    }

    public function show($flight_number)
    {
        $flight = $this->flightRepository->getflightByFlightNumber($flight_number);
        return view('pages.flight.show', compact('flight'));
    }
}
