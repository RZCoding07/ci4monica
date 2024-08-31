<?php
namespace App\Models;
use CodeIgniter\Model;

class AwalModel extends Model {
    
    protected $table = 'awal';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['kode', 'tahun', 'unit', 'parent', 'rekening_besar', 'nama_investasi', 'nilai_proyek_tahun_berjalan_rkap'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;    
    
}
