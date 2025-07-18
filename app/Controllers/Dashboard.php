<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    protected $measurementsModel;
    protected $toddlersModel;

    public function __construct()
    {
        $this->measurementsModel = new \App\Models\MeasurementModel();
        $this->toddlersModel = new \App\Models\ToddlersModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'measurementTotal' => $this->measurementsModel->getTotalMeasurementsByMonth(),
            'perRtTotal' => $this->toddlersModel->getRTGroupTotal(),
            'genderGroupTotal' => $this->toddlersModel->getGenderGroupTotal(),
            'statusGroupTotal' => $this->toddlersModel->getStatusGroupTotal(),
        ];

        // dd($data); // Debugging line, remove in production

        return view('pages/dashboard', $data);
    }
}
