<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Eloquent
{
    protected $connection = 'mongodb';
    protected $fillable = ['customer_name', 'customer_address', 'customer_email', 'customer_phone', 'customer_address_detail', 'customer_zip_code', 'zone_code' ];
    use SoftDeletes;
    use HasFactory;
}
