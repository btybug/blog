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
use Illuminate\Support\Facades\Blade;
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
                    'title' => 'Form List',
                    'url' => '/admin/blog/form-list',
                ],
            ]
        ];
        \Eventy::action('my.tab', $tubs);
        \Config::set('painter.PAINTERSPATHS',array_merge( \Config::get('painter.PAINTERSPATHS'),['app'.DS.'Plugins'.DS.'vendor'.DS.'btybug.hook'.DS.'blog'.DS.'src'.DS.'Config'.DS.'Gears'.DS.'FrontGears'.DS.'Units']));
        \Eventy::action('shortcode.except.url', [
            'admin/blog/form-list'
        ]);

        // this is not final functionality
        Blade::directive('phpPagination', function ($settings) {
            if(isset($settings['custom_pagination'])){
                return "<?php if (".$settings['custom_pagination']." == 'php') { ?>";
            }
        });
        Blade::directive('loadMore', function ($settings) {
            if(isset($settings['custom_pagination'])) {
                return "<?php } elseif(".$settings['custom_pagination']." == 'load') { ?>";
            }
        });
        Blade::directive('scroll', function ($settings) {
            if(isset($settings['custom_pagination'])) {
                return "<?php } elseif(".$settings['custom_pagination']." == 'scroll') { ?>";
            }
        });

        Blade::directive('endphpPagination', function () {
            if(isset($settings['custom_pagination'])) {
                return "<?php } ?>";
            }
        });

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

