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
    protected $allowedFields    = [];

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
        return $this->select('age, height, weight, profiles.email')
                    ->where('toddler_id', $id)
                    ->join('profiles', 'profiles.id=measurements.added_by')
                    ->orderBy('age', 'ASC')
                    ->findAll();
    }
}
