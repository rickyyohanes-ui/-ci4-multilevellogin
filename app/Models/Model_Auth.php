<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    protected $table = 'tbl_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_user', 'email', 'no_hp', 'password', 'level', 'foto_user'];

    // public function login($email, $password)
    // {
    //     return $this->where(['email' => $slug])->first();
    // }
}
