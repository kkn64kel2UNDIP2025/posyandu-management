<?php

namespace App\Models;

use CodeIgniter\Model;

class ToddlersModel extends Model
{
    protected $table            = 'toddlers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'jenis_kelamin', 'status' , 'birth_date' ,'still_toddler', 'parent_name', 'no_telp', 'description', 'rt'];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getToddlers($search = null)
    {
        $builder = $this->select('id, name, parent_name, status, rt');
        
        if ($search) {
            $builder->groupStart()
                    ->like('LOWER(name)', strtolower($search))
                    ->orLike('LOWER(parent_name)', strtolower($search))
                    ->groupEnd();
        }
        
        return $builder->paginate(6, 'toddlers');
    }

    public function getRTGroupTotal()
    {
        return $this->select('rt, COUNT(*) as total_warga')
                    ->where('still_toddler', true)
                    ->groupBy('rt')
                    ->findAll();
    }

    public function getGenderGroupTotal()
    {
        $data = $this->select('jenis_kelamin, COUNT(*) as toddler_count')
                    ->where('still_toddler', true)
                    ->groupBy('jenis_kelamin')
                    ->findAll();
        $result = [];
        foreach ($data as $row) {
            $result[$row['jenis_kelamin']] = $row['toddler_count'];
        }
        return $result;
    }

    public function getStatusGroupTotal()
    {
        return $this->select('status, COUNT(*) as toddler_count')
                    ->where('still_toddler', true)
                    ->groupBy('status')
                    ->findAll();
    }
}
