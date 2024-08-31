<?php
namespace App\Models;
use CodeIgniter\Model;

class ProgressLapanganModel extends Model {
    
    protected $table = 'progress_lapangan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['kode', 'unit', 'parent', 'nama_investasi', 'progress_lapangan', 'input_photo'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;    
    
}
