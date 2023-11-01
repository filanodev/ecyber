<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Sommaire
    Route::resource('sommaires', 'SommaireController', ['except' => ['destroy']]);

    // Confirme Paiement
    Route::delete('confirme-paiements/destroy', 'ConfirmePaiementController@massDestroy')->name('confirme-paiements.massDestroy');
    Route::resource('confirme-paiements', 'ConfirmePaiementController');

    // States
    Route::post('states/parse-csv-import', 'StatesController@parseCsvImport')->name('states.parseCsvImport');
    Route::post('states/process-csv-import', 'StatesController@processCsvImport')->name('states.processCsvImport');
    Route::resource('states', 'StatesController', ['except' => ['destroy']]);

    // Country
    Route::post('countries/parse-csv-import', 'CountryController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountryController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountryController', ['except' => ['create', 'store', 'destroy']]);

    // City
    Route::post('cities/parse-csv-import', 'CityController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CityController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CityController', ['except' => ['destroy']]);

    // Mode Paiement
    Route::delete('mode-paiements/destroy', 'ModePaiementController@massDestroy')->name('mode-paiements.massDestroy');
    Route::post('mode-paiements/media', 'ModePaiementController@storeMedia')->name('mode-paiements.storeMedia');
    Route::post('mode-paiements/ckmedia', 'ModePaiementController@storeCKEditorImages')->name('mode-paiements.storeCKEditorImages');
    Route::resource('mode-paiements', 'ModePaiementController');

    // Router
    Route::delete('routers/destroy', 'RouterController@massDestroy')->name('routers.massDestroy');
    Route::post('routers/parse-csv-import', 'RouterController@parseCsvImport')->name('routers.parseCsvImport');
    Route::post('routers/process-csv-import', 'RouterController@processCsvImport')->name('routers.processCsvImport');
    Route::resource('routers', 'RouterController');

    // Price
    Route::delete('prices/destroy', 'PriceController@massDestroy')->name('prices.massDestroy');
    Route::post('prices/parse-csv-import', 'PriceController@parseCsvImport')->name('prices.parseCsvImport');
    Route::post('prices/process-csv-import', 'PriceController@processCsvImport')->name('prices.processCsvImport');
    Route::resource('prices', 'PriceController');

    // Ticket
    Route::delete('tickets/destroy', 'TicketController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/parse-csv-import', 'TicketController@parseCsvImport')->name('tickets.parseCsvImport');
    Route::post('tickets/process-csv-import', 'TicketController@processCsvImport')->name('tickets.processCsvImport');
    Route::resource('tickets', 'TicketController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
