<?php
namespace App\Models;
use CodeIgniter\Model;

class StoklokasipervarModel extends Model {
    
	protected $table = 'stok_lokasi_per_var';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['regional', 'kebun', 'varietas', 'lokasi', 'nursery_month_1', 'nursery_month_2', 'nursery_month_3', 'nursery_month_4', 'nursery_month_5', 'nursery_month_6', 'nursery_month_7', 'nursery_month_8', 'nursery_month_9', 'nursery_month_10', 'nursery_month_11', 'nursery_month_12', 'nursery_month_13', 'nursery_month_14', 'nursery_month_15', 'nursery_month_16', 'nursery_month_17', 'nursery_month_18', 'nursery_month_19', 'nursery_month_20', 'nursery_month_21', 'nursery_month_22', 'nursery_month_23', 'nursery_month_24', 'nursery_month_25', 'nursery_month_26', 'nursery_month_27', 'nursery_month_28', 'nursery_month_29', 'nursery_month_30_plus'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}