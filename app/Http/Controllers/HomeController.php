<?php

namespace App\Http\Controllers;


use App\Interfaces\airportRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private airportRepositoryInterface $airportRepository;

    public function __construct(airportRepositoryInterface $airportRepository)
    {
        $this->airportRepository = $airportRepository;
    }

    public function index()
    {
        $airports = $this->airportRepository->getAllAirports();

        return view('pages.home', compact('airports'));
        //, compact('airports')
    }
}
