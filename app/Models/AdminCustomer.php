<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCustomer extends Model
{
    use HasFactory;

    protected $table = 'admin_customer';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
