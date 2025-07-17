<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Config\App;

class Toddler extends BaseController
{
    protected $toddlersModel;
    protected $measurementsModel;

    public function __construct()
    {
        $this->toddlersModel = new \App\Models\ToddlersModel();
        $this->measurementsModel = new \App\Models\MeasurementModel();
    }

    // Toddlers Page
    public function index()
    {        
        $search = $this->request->getGet('search');
        
        $data = [
            'toddlers' => $this->toddlersModel->getToddlers($search),
            'pager' => $this->toddlersModel->pager->links('toddlers','toddlers_pagination'),
        ];

        if($this->request->isAJAX()){
            return $this->response->setJSON($data);
        }

        $data['title'] = 'Balita';
        $data['monthAttendances'] = $this->measurementsModel->getTotalMeasurementsByMonth();

        return view('pages/toddlers', $data);
    }

    public function MonthDetail($monthYear) {
        $data = [
            'title' => 'Detail Bulanan',
            'monthYear' => $monthYear,
            'measurements' => $this->measurementsModel->getToddlersByMonth($monthYear)
        ];

        return view('pages/month_detail', $data);
    }

    public function AddToddler()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
            'birth_date' => $this->request->getVar('birth-date'),
            'parent_name' => $this->request->getVar('parent-name'),
            'no_telp' => $this->request->getVar('no-telp'),
            'rt' => $this->request->getVar('rt'),
            'description' => $this->request->getVar('description')
        ];
        
        $this->toddlersModel->insert($data);
        
        return redirect()->back()->with('success', 'Data balita berhasil ditambah');
        
    }
    
    // Detail Page
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Balita',
            'data' => $this->toddlersModel->find($id),
            'measurements' => $this->measurementsModel->getMeasurementsByToddlerId($id)
        ];

        return view('pages/detail', $data);
    }

    public function EditToddler()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'birth_date' => $this->request->getVar('birth-date'),
            'jenis_kelamin' => $this->request->getVar('jenis-kelamin'),
            'status' => $this->request->getVar('status'),
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
            'no_telp' => $this->request->getVar('no-telp'),
            'rt' => $this->request->getVar('rt')
        ];
        
        $this->toddlersModel->update($id, $data);
        
        return redirect()->back()->with('success', 'Data orang tua berhasil diubah');
    }

    public function AddMeasurement()
    {
        $data = [
            'toddler_id' => $this->request->getVar('toddler-id'),
            'age' => $this->request->getVar('age'),
            'height' => $this->request->getVar('height'),
            'weight' => $this->request->getVar('weight'),
            'added_by' => session()->get('user_data')['id'],
            'head_circum' => $this->request->getVar('head_circum'),
            'chest_size' => $this->request->getVar('chest_size'),
            'arm_circum' => $this->request->getVar('arm_circum')
        ];

        $this->measurementsModel->insert($data);
        
        return redirect()->back()->with('success', 'Data pengukuran berhasil ditambah');
    }

    public function EditMeasurement()
    {
        $this->measurementsModel->save($this->request->getVar());
        
        return redirect()->back()->with('success', 'Data pengukuran berhasil diubah');
    }

    public function DeleteMeasurement()
    {
        $id = $this->request->getVar('id');
        
        if ($this->measurementsModel->delete($id)) {
            return redirect()->back()->with('success', 'Data pengukuran berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data pengukuran');
        }
    }
}
