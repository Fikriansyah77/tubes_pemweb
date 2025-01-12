<?php

namespace App\Http\Controllers;


use App\Interfaces\AirportRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private AirportRepositoryInterface $airportRepository;

    public function __construct(AirportRepositoryInterface $airportRepository)
    {
        $this->airportRepository = $airportRepository;
    }

    public function index()
    {
        $airports = $this->airportRepository->getAllairports();

        return view('pages.home', compact('airports'));
    }
}
