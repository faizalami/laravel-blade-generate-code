<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 31/10/18
 * Time: 23:12
 */

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index() {
        $blade_render = html_entity_decode(view('template.blade-template')->render(), ENT_QUOTES, 'utf-8');

        file_put_contents(resource_path('views/coba.blade.php'), $blade_render);

        return view('show-template', [
            'blade_render' => $blade_render
        ]);
    }

    public function showController() {
        $controllerData = [
            'className' => 'CobaController',
            'props' => [
                [
                    'modifier' => 'public',
                    'name' => '$prop1'
                ],
                [
                    'modifier' => 'private',
                    'name' => '$prop2',
                    'assignment' => '\'abc\''
                ],
            ],
            'methods' => [
                [
                    'modifier' => 'public',
                    'name' => 'view',
                    'args' => '$id',
                    'body' => 'return \'coba berhasil\';'
                ]
            ]
        ];

        $blade_render = html_entity_decode(view('template.controller-template', $controllerData)->render(), ENT_QUOTES, 'utf-8');

        file_put_contents(app_path('Http/Controllers/' . $controllerData['className'] . '.php'), $blade_render);

        return view('show-template', [
            'blade_render' => $blade_render
        ]);
    }
}