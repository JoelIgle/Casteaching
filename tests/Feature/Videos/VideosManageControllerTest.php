<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosManageController
 */
class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_with_permissions_can_update_videos()
    {
        $this->withoutExceptionHandling();
        $this->loginAsVideoManager();

        $video = Video::create([
            'title' => 'Title',
            'description' => 'aas',
            'url' => 'https://www.youtube.com/watch?v=1',
        ]);

        $response = $this->put('/manage/videos/'. $video->id,[
            'title' => 'change',
            'description' => 'aas change',
            'url' => 'https://www.youtube.com/watch?v=12331',

        ]);

        $response->assertRedirect(route('videos.manage.index'));

        $response->assertSessionHas('status', 'Video updated successfully');

        $newVideo = Video::find($video->id);
        $this->assertEquals( 'change', $newVideo->title,);
        $this->assertEquals( 'aas change', $newVideo->description,);
        $this->assertEquals( 'https://www.youtube.com/watch?v=12331', $newVideo->url,);
        $this->assertEquals( $video->id, $newVideo->id,);




    }

    /** @test */
    public function users_with_permissions_can_see_edit_videos()
    {
        $this->withoutExceptionHandling();
        $this->loginAsVideoManager();

        $video = Video::create([
            'title' => 'Title',
            'description' => 'aas',
            'url' => 'https://www.youtube.com/watch?v=1',
        ]);

        $response = $this->get('/manage/videos/'. $video->id);

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.edit');
        $response->assertViewHas('video', function ($v) use ($video){
            return $v->id === $video->id && get_class($v) === Video::class;
        });
        $response->assertSee('<form data-qa="form_video_edit"', false);

        $response->assertSeeText($video->title);
        $response->assertSeeText($video->description);
        $response->assertSee($video->url);

    }

    /** @test */
    public function users_with_permissions_can_destroy_videos()
    {
        $this->loginAsVideoManager();

        $video = Video::create([
            'title' => 'Title',
            'description' => 'aas',
            'url' => 'https://www.youtube.com/watch?v=1',
        ]);

        $response = $this->delete('/manage/videos/'. $video->id);

        $response->assertRedirect(route('videos.manage.index'));
        $response->assertSessionHas('status', 'Video deleted successfully');


        $this->assertNull(Video::find($video->id));
        $this->assertNull($video->fresh());


    }

    /** @test */
//    public function user_with_permissions_can_store_videos(){
//        $this->loginAsVideoManager();
//
//        $response = $this->post('/manage/videos',[
//            'title' => 'Title',
//            'description' => 'aas',
//            'url' => 'https://www.youtube.com/watch?v=1',
//        ]);
//
//        $videoDB = Video::first();
//
//        $this->assertNotNull($videoDB);
//        $this->assertEquals($videoDB->title, $response->title);
//        $this->assertEquals($videoDB->description, $response->description);
//        $this->assertEquals($videoDB->url, $response->url);
//    }
    /** @test */
    public function user_with_permissions_can_see_add_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');

        $response->assertSee('<form data-qa="form_video_create"', false);
    }

    /** @test */
    public function user_without_videos_manage_create_cannot_see_add_videos()
    {
        Permission::firstOrCreate(['name' => 'videos_manage_index']);
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'Pepe',
            'password' => Hash::make('12345678')
        ]);
        $user->givePermissionTo('videos_manage_index');
        Auth::login($user);

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');

        $response->assertDontSee('<form data-qa="form_video_create"', false);
    }


    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $videos = create_sample_videos();

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
        $response->assertViewHas('videos',function ($v) use ($videos){
            return count($videos) === count($v) && get_class($v) === Collection::class && get_class($videos[0]) === Video::class;
        });
        foreach ($videos as $video){
            $response->assertSee($video->id);
            $response->assertSee($video->title);
        }
    }

    /** @test */
    public function regular_users_can_manage_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->get('/manage/videos');

        $response->assertstatus(403);
    }

    /** @test */
    public function guest_users_can_manage_videos()
    {
        $response = $this->get('/manage/videos');

        $response->assertRedirect(route('login'));
    }

    /** @test */

    public function superadmins_can_manage_videos()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
    }

    private function loginAsVideoManager()
    {
        Auth::login(create_video_manager_user());
    }

    private function loginAsSuperAdmin()
    {
        Auth::login(create_super_admin_user());
    }
    private function loginAsRegularUser()
    {
        Auth::login(create_regular_user());
    }
}
