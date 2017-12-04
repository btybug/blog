<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace BtyBugHook\Blog\Providers;
use Btybug\btybug\Models\Routes;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../views', 'blog');
        $this->loadViewsFrom(__DIR__ . '/../views', 'blog');
        dd(54545);
        \Eventy::action('admin.menus', [
            "title" => "Blog",
            "custom-link" => "#",
            "icon" => "fa fa-anchor",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Posts",
                    "custom-link" => "/admin/blog/posts",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "New post",
                    "custom-link" => "/admin/blog/new-post",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Settings",
                    "custom-link" => "/admin/blog/settings",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ]
            ]]);
        $tubs = [
            'blog_pages' => [
                [
                    'title' => 'General',
                    'url' => '/admin/blog/settings',
                ], [
                    'title' => 'Form Bulder',
                    'url' => '/admin/blog/form-bulder',
                ],
            ]
        ];
        \Eventy::action('my.tab', $tubs);

        Routes::registerPages('btybug.hook/blog');
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

    }

}

