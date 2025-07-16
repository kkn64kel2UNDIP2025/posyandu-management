<?php

namespace App\Models;

use CodeIgniter\Model;

class MeasurementModel extends Model
{
    protected $table            = 'measurements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['toddler_id', 'age', 'height', 'weight', 'added_by', 'head_circum', 'chest_size', 'arm_circum'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';


    public function getMeasurementsByToddlerId($id)
    {
        return $this->select('id, age, height, weight, head_circum, chest_size, arm_circum')
                    ->where('toddler_id', $id)
                    // ->join('profiles', 'profiles.id=measurements.added_by')
                    ->orderBy('age', 'ASC')
                    ->findAll();
    }

    public function getTotalMeasurementsByMonth()
    {
        return $this->select("TO_CHAR(created_at, 'YYYY-MM') AS x, COUNT(*) AS y", false)
                ->groupBy("TO_CHAR(created_at, 'YYYY-MM')")
                ->orderBy("x", "ASC")
                ->findAll();
    }
}
