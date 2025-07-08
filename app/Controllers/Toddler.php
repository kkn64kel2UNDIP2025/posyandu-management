<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Config\App;

class Toddler extends BaseController
{
    protected $toddlersModel;
    protected $attendancesModel;
    protected $measurementsModel;

    public function __construct()
    {
        $this->toddlersModel = new \App\Models\ToddlersModel();
        $this->attendancesModel = new \App\Models\AttendanceModel();
        $this->measurementsModel = new \App\Models\MeasurementModel();
    }

    public function index()
    {        
        $page = $this->request->getVar('page_toddlers');

        $data = [
            'title' => 'Balita',
            'toddlers' => $this->toddlersModel->getToddlers($page),
            'attendances' => $this->attendancesModel->findAll(),
            'pager' => $this->toddlersModel->pager->links('toddlers','toddlers_pagination'),

        ];

        return view('pages/toddlers', $data);
    }

    public function detail($id)
    {      
        $data = [
            'title' => 'Detail Balita',
            'data' => $this->toddlersModel->find($id),
            'measurements' => $this->measurementsModel->getMeasurementsByToddlerId($id)
        ];

        return view('pages/detail', $data);
    }

    public function AddToddler()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
            'birth_date' => $this->request->getVar('birth-date'),
            'parent_name' => $this->request->getVar('parent-name'),
            'no_telp' => $this->request->getVar('no-telp'),
            'description' => $this->request->getVar('description')
        ];

        $this->toddlersModel->insert($data);

        return redirect()->back()->with('success', 'Data balita berhasil ditambah');
        
    }

    public function EditToddler()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
            'description' => $this->request->getVar('description'),
            'still_toddler' => ($this->request->getVar('is-toddler')) ? true : false
        ];

        $this->toddlersModel->update($id, $data);

        return redirect()->back()->with('success', 'Data balita berhasil diubah');
    }
    
    public function EditParent()
    {
        $id = $this->request->getVar('id');
        $data = [
            'parent_name' => $this->request->getVar('parent-name'),
            'no_telp' => $this->request->getVar('no-telp')
        ];
        
        $this->toddlersModel->update($id, $data);
        
        return redirect()->back()->with('success', 'Data orang tua berhasil diubah');
        
    }
}
