<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function() {
    Route::get('rivile/dept', [
        'as' => 'admin.routes.rivile.dept.index',
        'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_list'],
        'uses' => 'Rivile\\HCRivileDeptController@adminIndex',
    ]);

    Route::group(['prefix' => 'api/rivile/dept'], function() {
        Route::get('/', [
            'as' => 'admin.api.routes.rivile.dept',
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_list'],
            'uses' => 'Rivile\\HCRivileDeptController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_create'],
            'uses' => 'Rivile\\HCRivileDeptController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_delete'],
            'uses' => 'Rivile\\HCRivileDeptController@apiDestroy',
        ]);

        Route::get('list', [
            'as' => 'admin.api.routes.rivile.dept.list',
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_list'],
            'uses' => 'Rivile\\HCRivileDeptController@apiIndex',
        ]);
        Route::post('restore', [
            'as' => 'admin.api.routes.rivile.dept.restore',
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_update'],
            'uses' => 'Rivile\\HCRivileDeptController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.routes.rivile.dept.merge',
            'middleware' => [
                'acl:interactivesolutions_rivile_routes_rivile_dept_create',
                'acl:interactivesolutions_rivile_routes_rivile_dept_delete',
            ],
            'uses' => 'Rivile\\HCRivileDeptController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'admin.api.routes.rivile.dept.force',
            'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_force_delete'],
            'uses' => 'Rivile\\HCRivileDeptController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'admin.api.routes.rivile.dept.single',
                'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_list'],
                'uses' => 'Rivile\\HCRivileDeptController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_update'],
                'uses' => 'Rivile\\HCRivileDeptController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_delete'],
                'uses' => 'Rivile\\HCRivileDeptController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'admin.api.routes.rivile.dept.update.strict',
                'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_update'],
                'uses' => 'Rivile\\HCRivileDeptController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'admin.api.routes.rivile.dept.duplicate.single',
                'middleware' => [
                    'acl:interactivesolutions_rivile_routes_rivile_dept_list',
                    'acl:interactivesolutions_rivile_routes_rivile_dept_create',
                ],
                'uses' => 'Rivile\\HCRivileDeptController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'admin.api.routes.rivile.dept.force.single',
                'middleware' => ['acl:interactivesolutions_rivile_routes_rivile_dept_force_delete'],
                'uses' => 'Rivile\\HCRivileDeptController@apiForceDelete',
            ]);
        });
    });
});
