<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sommaire extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'sommaires';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'identifiant',
        'description',
        'montant',
        'montant_payer',
        'status',
        'type_payement',
        'ask_payement',
        'confirm_payement',
        'commentaire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
