<?php
namespace App\Models;
use CodeIgniter\Model;

class PksModel extends Model {
    
	protected $table = 'pks';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nama_pks', 'regional_id', 'kaps_terpasang', 'faktor_koreksi_kaps', 'faktor_koreksi_utilitas', 'unit', 'instalasi_bunch_press', 'pln_isasi', 'cofiring', 'hidden_pica_cost', 'hidden_pica_cpo', 'jenis'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}