<?php 

namespace App\Models;

use CodeIgniter\Model;

class MPendaftar extends Model
{
        protected $table = 'pendaftar';
        
        protected $primaryKey = 'id_pendaftar';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_pendaftar','nama_pendaftar','email_pendaftar','tanggal_lahir_pendaftar', 'alamat_pendaftar','id_event'];
  
}