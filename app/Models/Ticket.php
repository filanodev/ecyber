<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'tickets';

    public const ETAT_SELECT = [
        '1' => 'NEW',
        '2' => 'USED',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'login',
        'password',
        'etat',
        'users_id',
        'router_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function router()
    {
        return $this->belongsTo(Router::class, 'router_id');
    }
}
