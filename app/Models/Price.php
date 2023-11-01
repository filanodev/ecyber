<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'prices';

    public const STATUS_SELECT = [
        '1' => 'ON',
        '2' => 'OFF',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'router_id',
        'libelle',
        'price_sell',
        'link',
        'users_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function router()
    {
        return $this->belongsTo(Router::class, 'router_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
