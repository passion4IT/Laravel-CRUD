<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiUser
 * @package App\Models
 */
class ApiUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'country', 'active'
    ];
}
