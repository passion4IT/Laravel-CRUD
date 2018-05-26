<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApiUser
 * @package App\Models
 */
class ApiUser extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'country', 'active'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
}
