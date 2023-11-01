<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'livre_des_compte_access',
            ],
            [
                'id'    => 24,
                'title' => 'sommaire_create',
            ],
            [
                'id'    => 25,
                'title' => 'sommaire_edit',
            ],
            [
                'id'    => 26,
                'title' => 'sommaire_show',
            ],
            [
                'id'    => 27,
                'title' => 'sommaire_access',
            ],
            [
                'id'    => 28,
                'title' => 'confirme_paiement_create',
            ],
            [
                'id'    => 29,
                'title' => 'confirme_paiement_edit',
            ],
            [
                'id'    => 30,
                'title' => 'confirme_paiement_show',
            ],
            [
                'id'    => 31,
                'title' => 'confirme_paiement_delete',
            ],
            [
                'id'    => 32,
                'title' => 'confirme_paiement_access',
            ],
            [
                'id'    => 33,
                'title' => 'standing_data_access',
            ],
            [
                'id'    => 34,
                'title' => 'state_create',
            ],
            [
                'id'    => 35,
                'title' => 'state_edit',
            ],
            [
                'id'    => 36,
                'title' => 'state_show',
            ],
            [
                'id'    => 37,
                'title' => 'state_access',
            ],
            [
                'id'    => 38,
                'title' => 'country_edit',
            ],
            [
                'id'    => 39,
                'title' => 'country_show',
            ],
            [
                'id'    => 40,
                'title' => 'country_access',
            ],
            [
                'id'    => 41,
                'title' => 'city_create',
            ],
            [
                'id'    => 42,
                'title' => 'city_edit',
            ],
            [
                'id'    => 43,
                'title' => 'city_show',
            ],
            [
                'id'    => 44,
                'title' => 'city_access',
            ],
            [
                'id'    => 45,
                'title' => 'mode_paiement_create',
            ],
            [
                'id'    => 46,
                'title' => 'mode_paiement_edit',
            ],
            [
                'id'    => 47,
                'title' => 'mode_paiement_show',
            ],
            [
                'id'    => 48,
                'title' => 'mode_paiement_delete',
            ],
            [
                'id'    => 49,
                'title' => 'mode_paiement_access',
            ],
            [
                'id'    => 50,
                'title' => 'g_cyber_access',
            ],
            [
                'id'    => 51,
                'title' => 'router_create',
            ],
            [
                'id'    => 52,
                'title' => 'router_edit',
            ],
            [
                'id'    => 53,
                'title' => 'router_show',
            ],
            [
                'id'    => 54,
                'title' => 'router_delete',
            ],
            [
                'id'    => 55,
                'title' => 'router_access',
            ],
            [
                'id'    => 56,
                'title' => 'price_create',
            ],
            [
                'id'    => 57,
                'title' => 'price_edit',
            ],
            [
                'id'    => 58,
                'title' => 'price_show',
            ],
            [
                'id'    => 59,
                'title' => 'price_delete',
            ],
            [
                'id'    => 60,
                'title' => 'price_access',
            ],
            [
                'id'    => 61,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 62,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 63,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 64,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 65,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 66,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
