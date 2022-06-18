<?php 

namespace App\Models;

use CodeIgniter\Model;

class MEvent extends Model
{
        protected $table = 'event';
        
        protected $primaryKey = 'id_event';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_event','nama_event','tanggal_event','informasi_event' ];
  
}