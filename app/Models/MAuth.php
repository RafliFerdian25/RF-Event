<?php 

namespace App\Models;

use CodeIgniter\Model;

class MAuth extends Model
{
        protected $table = 'auth';
        
        protected $primaryKey = 'id';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id','nama','email','password' ];
  
}