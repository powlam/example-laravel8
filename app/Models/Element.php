<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 5;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'int',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 'title', 'description', 'status', ];

    /**
     * Helpers
     */
    public static function validStatuses(): array
    {
        return range(0, 5);
    }

    public static function isValidStatus($status): bool
    {
        return $status !== null && $status !== '' && in_array($status, self::validStatuses());
    }

}
