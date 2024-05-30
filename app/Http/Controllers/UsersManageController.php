<?php

namespace App\Http\Controllers;

use App\Models\User;
use Feature\Users\UsersManageControllerTest;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\Videos\VideosManageControllerTest;
use App\Events\VideoCreatedEvent;
use App\Models\Video;
use App\Notifications\VideoCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class UsersManageController extends Controller
{
    public static function testedBy()
    {
        return UsersManageControllerTest::class;
    }
    public function index()
    {
        return view('users.manage.index',[
            'users' => User::all()
        ]);

    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        session()->flash('status', 'User created successfully');

        return redirect()->route('users.manage.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        session()->flash('status', 'User deleted successfully');

        return redirect()->route('users.manage.index');
    }

    public function edit($id)
    {
        return view('users.manage.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        session()->flash('status', 'User updated successfully');

        return redirect()->route('users.manage.index');
    }
}

