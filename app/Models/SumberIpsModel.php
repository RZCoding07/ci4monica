<?php
namespace App\Models;
use CodeIgniter\Model;

class SumberIpsModel extends Model {
    
    protected $table = 'sumber_ips';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['kode', 'unit', 'parent', 'nama_investasi', 'nomor_ppab_pp', 'nomor_pk', 'tgl_create_pk', 'tgl_submit_ke_pengadaan', 'nomor_sppbj'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;    
    
}




