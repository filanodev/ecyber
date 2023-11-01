<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Router extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'routers';

    public const ACTIVE_SMS_SELECT = [
        '1' => 'ON',
        '2' => 'OFF',
    ];

    public const ACTIVE_VPN_SELECT = [
        '1' => 'ON',
        '2' => 'OFF',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ACTIVE_PUB_LOCAL_SELECT = [
        '1' => 'ON',
        '2' => 'OFF',
    ];

    public const ACTIVE_BUP_GLOBAL_SELECT = [
        '1' => 'ON',
        '2' => 'OFF',
    ];

    public const TYPE_SERVEUR_SELECT = [
        '1' => 'MICROTICK',
        '2' => 'ALCASAR',
        '3' => 'AUTRE',
    ];

    protected $fillable = [
        'libelle',
        'contact',
        'dns_name',
        'solde',
        'active_sms',
        'type_serveur',
        'payement_token',
        'mode_paiement_id',
        'country_id',
        'city_id',
        'map',
        'active_pub_local',
        'active_bup_global',
        'active_vpn',
        'code_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function mode_paiement()
    {
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
