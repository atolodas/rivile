<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('rivile/clients', ['as' => 'admin.routes.rivile.clients.index', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_list'], 'uses' => 'rivile\\HCRivileClientsController@adminIndex']);

    Route::group(['prefix' => 'api/rivile/clients'], function ()
    {
        Route::get('/', ['as' => 'admin.api.routes.rivile.clients', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_list'], 'uses' => 'rivile\\HCRivileClientsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_create'], 'uses' => 'rivile\\HCRivileClientsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_delete'], 'uses' => 'rivile\\HCRivileClientsController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.routes.rivile.clients.list', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_list'], 'uses' => 'rivile\\HCRivileClientsController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.routes.rivile.clients.restore', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_update'], 'uses' => 'rivile\\HCRivileClientsController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.routes.rivile.clients.merge', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_create', 'acl:interactivesolutions_rivile_routes_rivile_clients_delete'], 'uses' => 'rivile\\HCRivileClientsController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.routes.rivile.clients.force', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_force_delete'], 'uses' => 'rivile\\HCRivileClientsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.routes.rivile.clients.single', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_list'], 'uses' => 'rivile\\HCRivileClientsController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_update'], 'uses' => 'rivile\\HCRivileClientsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_delete'], 'uses' => 'rivile\\HCRivileClientsController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.routes.rivile.clients.update.strict', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_update'], 'uses' => 'rivile\\HCRivileClientsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.routes.rivile.clients.duplicate.single', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_list', 'acl:interactivesolutions_rivile_routes_rivile_clients_create'], 'uses' => 'rivile\\HCRivileClientsController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.routes.rivile.clients.force.single', 'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_clients_force_delete'], 'uses' => 'rivile\\HCRivileClientsController@apiForceDelete']);
        });
    });
});
