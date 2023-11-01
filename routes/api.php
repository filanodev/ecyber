<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Sommaire
    Route::apiResource('sommaires', 'SommaireApiController', ['except' => ['destroy']]);

    // Confirme Paiement
    Route::apiResource('confirme-paiements', 'ConfirmePaiementApiController');

    // Country
    Route::apiResource('countries', 'CountryApiController', ['except' => ['store', 'destroy']]);

    // Mode Paiement
    Route::post('mode-paiements/media', 'ModePaiementApiController@storeMedia')->name('mode-paiements.storeMedia');
    Route::apiResource('mode-paiements', 'ModePaiementApiController');

    // Router
    Route::apiResource('routers', 'RouterApiController');

    // Price
    Route::apiResource('prices', 'PriceApiController');

    // Ticket
    Route::apiResource('tickets', 'TicketApiController');
});
