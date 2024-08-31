<?php
namespace App\Models;
use CodeIgniter\Model;

class KebunModel extends Model {
    
	protected $table = 'kebun';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['regional', 'lokasi', 'pn', 'mn', 'jumlah', 'keterangan'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}