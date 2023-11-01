<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('g_cyber_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-american-sign-language-interpreting">

                        </i>
                        <span>{{ trans('cruds.gCyber.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('router_access')
                            <li class="{{ request()->is("admin/routers") || request()->is("admin/routers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.routers.index") }}">
                                    <i class="fa-fw fab fa-audible">

                                    </i>
                                    <span>{{ trans('cruds.router.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('price_access')
                            <li class="{{ request()->is("admin/prices") || request()->is("admin/prices/*") ? "active" : "" }}">
                                <a href="{{ route("admin.prices.index") }}">
                                    <i class="fa-fw fas fa-dollar-sign">

                                    </i>
                                    <span>{{ trans('cruds.price.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ticket_access')
                            <li class="{{ request()->is("admin/tickets") || request()->is("admin/tickets/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tickets.index") }}">
                                    <i class="fa-fw fas fa-ticket-alt">

                                    </i>
                                    <span>{{ trans('cruds.ticket.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('standing_data_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-table">

                        </i>
                        <span>{{ trans('cruds.standingData.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('country_access')
                            <li class="{{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                <a href="{{ route("admin.countries.index") }}">
                                    <i class="fa-fw fas fa-globe-americas">

                                    </i>
                                    <span>{{ trans('cruds.country.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('state_access')
                            <li class="{{ request()->is("admin/states") || request()->is("admin/states/*") ? "active" : "" }}">
                                <a href="{{ route("admin.states.index") }}">
                                    <i class="fa-fw fas fa-globe">

                                    </i>
                                    <span>{{ trans('cruds.state.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('city_access')
                            <li class="{{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cities.index") }}">
                                    <i class="fa-fw fas fa-grip-vertical">

                                    </i>
                                    <span>{{ trans('cruds.city.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('livre_des_compte_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book-open">

                        </i>
                        <span>{{ trans('cruds.livreDesCompte.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('mode_paiement_access')
                            <li class="{{ request()->is("admin/mode-paiements") || request()->is("admin/mode-paiements/*") ? "active" : "" }}">
                                <a href="{{ route("admin.mode-paiements.index") }}">
                                    <i class="fa-fw fas fa-bezier-curve">

                                    </i>
                                    <span>{{ trans('cruds.modePaiement.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('sommaire_access')
                            <li class="{{ request()->is("admin/sommaires") || request()->is("admin/sommaires/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sommaires.index") }}">
                                    <i class="fa-fw fas fa-align-center">

                                    </i>
                                    <span>{{ trans('cruds.sommaire.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('confirme_paiement_access')
                            <li class="{{ request()->is("admin/confirme-paiements") || request()->is("admin/confirme-paiements/*") ? "active" : "" }}">
                                <a href="{{ route("admin.confirme-paiements.index") }}">
                                    <i class="fa-fw fas fa-check-double">

                                    </i>
                                    <span>{{ trans('cruds.confirmePaiement.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>