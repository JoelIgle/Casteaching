<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

if (!function_exists('create_default_user')) {
    function create_default_user()
    {
        User::create([
            'name' => Hash::make(config('casteaching.user_profe.name')),
            'email' => Hash::make(config('casteaching.user_profe.email')),
            'password' => Hash::make(config('casteaching.user_profe.password')),
        ]);
    }


}

if (!function_exists('create_default_videos')) {
    function create_permissions()
    {
        Permission::firstOrCreate(['name' => 'videos_manage_index']);
        Permission::firstOrCreate(['name' => 'videos_manage_create']);

    }

}
if (!function_exists('create_default_videos')) {
    function create_default_videos()
    {
        Video::create([
            'title' => 'Video de la bd',
            'description' => 'Aquest video es de la bd',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);
    }
}
if (!function_exists('create_superadmin_user')) {

    function create_superadmin_user()
    {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->superadmin = true;
        $user->save();
        return $user;
    }
}

if (!function_exists('create_regular_user')) {

    function create_regular_user()
    {
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'pepe@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);

        return $user;
    }
}

if (!function_exists('create_sample_video')) {

    function create_sample_video()
    {
        return Video::create([
            'title' => 'Video de test',
            'description' => 'Aquest video es de test',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);
    }
}

if (!function_exists('create_sample_videos')) {

    function create_sample_videos()
    {
        $video1 = Video::create([
            'title' => 'Video de test',
            'description' => 'Aquest video es de test',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);
        $video2 = Video::create([
            'title' => 'Video de test 2',
            'description' => 'Aquest video es de test 2',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);

        return [$video1, $video2];

    }

}

if (!function_exists('create_video_manager_user')) {

        function create_video_manager_user()
        {
            $user = User::create([
                'name' => 'VideosManager',
                'email' => 'joeliglesias@iesebre.com',
                'password' => Hash::make('12345678'),
            ]);

            Permission::create(['name' => 'videos_manage_index']);
            Permission::create(['name' => 'videos_manage_create']);
            Permission::create(['name' => 'videos_manage_store']);
            Permission::create(['name' => 'videos_manage_edit']);
            Permission::create(['name' => 'videos_manage_update']);
            Permission::create(['name' => 'videos_manage_destroy']);

            $user->givePermissionTo('videos_manage_index');
            $user->givePermissionTo('videos_manage_create');
            $user->givePermissionTo('videos_manage_store');
            $user->givePermissionTo('videos_manage_edit');
            $user->givePermissionTo('videos_manage_update');
            $user->givePermissionTo('videos_manage_destroy');



            return $user;
        }
}

if (!function_exists('create_super_admin_user')) {

    function create_super_admin_user()
    {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);

        Permission::firstOrCreate(['name' => 'videos_manage_index']);
        Permission::firstOrCreate(['name' => 'videos_manage_create']);
        Permission::firstOrCreate(['name' => 'videos_manage_store']);
        Permission::firstOrCreate(['name' => 'videos_manage_edit']);
        Permission::firstOrCreate(['name' => 'videos_manage_update']);
        Permission::firstOrCreate(['name' => 'videos_manage_destroy']);

        $user->givePermissionTo('videos_manage_index');
        $user->givePermissionTo('videos_manage_create');
        $user->givePermissionTo('videos_manage_store');
        $user->givePermissionTo('videos_manage_edit');
        $user->givePermissionTo('videos_manage_update');
        $user->givePermissionTo('videos_manage_destroy');


        return $user;
    }
}

if (!function_exists('create_super_admin_user_profe')) {

    function create_super_admin_user_profe()
    {
        $user = User::create([
            'name' => 'SuperAdminProfe',
            'email' => 'jordivega@iesebre.com',
            'password' => Hash::make('12345678'),
        ]);

        Permission::firstOrCreate(['name' => 'videos_manage_index']);
        Permission::firstOrCreate(['name' => 'videos_manage_create']);
        Permission::firstOrCreate(['name' => 'videos_manage_store']);
        Permission::firstOrCreate(['name' => 'videos_manage_edit']);
        Permission::firstOrCreate(['name' => 'videos_manage_update']);
        Permission::firstOrCreate(['name' => 'videos_manage_destroy']);

        $user->givePermissionTo('videos_manage_index');
        $user->givePermissionTo('videos_manage_create');
        $user->givePermissionTo('videos_manage_store');
        $user->givePermissionTo('videos_manage_edit');
        $user->givePermissionTo('videos_manage_update');
        $user->givePermissionTo('videos_manage_destroy');


        return $user;
    }
}

if (!function_exists('create_video')) {

    function create_video()
    {
        $video = Video::create([
            'title' => 'Video de la bd',
            'description' => 'Aquest video es de la bd',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);

        return $video;
    }
}



