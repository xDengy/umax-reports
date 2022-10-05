<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function renderMain() {
        return view('main.index');
    }

    public function userExist(Request $request)
    {
        $data = $request->all()['formResult'];
        $user = User::where([
            ['login', $data['login']],
            ['email', $data['email']]
        ])->first();
        return boolval($user);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $fileStore = $request->file('image')
            ->storeAs('uploads', $fileName, 'public');
        $filePath = '/storage/' . $fileStore;
        $data['image'] = $filePath;
        if($filePath) {
            $user = User::create($data);
            Auth::login($user);
            return redirect('/listreports/');
        }
    }

    public function getUser($id)
    {
        return User::where('id', $id)->first();
    }

    public function newReport(Request $request)
    {
        $data = $request->all();

        $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
        $fileStore = $request->file('logo')
            ->storeAs('uploads', $fileName, 'public');
        $filePath = '/storage/' . $fileStore;
        $data['logo'] = $filePath;

        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $fileStore = $request->file('photo')
            ->storeAs('uploads', $fileName, 'public');
        $filePath = '/storage/' . $fileStore;
        $data['photo'] = $filePath;

        $data['user_id'] = auth()->user()->id;

        $report = Report::create($data);

        return redirect('/reports/' . $report->id);
    }

    public function settings(Request $request)
    {
        $data = $request->all();

        if($request->file('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $fileStore = $request->file('logo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['logo'] = $filePath;
        } else {
            unset($data['logo']);
        }

        if($request->file('company')) {
            $fileName = time() . '_' . $request->file('company')->getClientOriginalName();
            $fileStore = $request->file('company')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['company'] = $filePath;
        } else {
            unset($data['company']);
        }

        $data['user_id'] = auth()->user()->id;

        $setting = Setting::where('user_id', $data['user_id'])->first();

        if(!$setting)
            Setting::create($data);
        else
            $setting->update($data);

        return redirect('/settings');
    }

    public function personal(Request $request)
    {
        $data = $request->all();
        $id = auth()->user()->id;

        if($request->file('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $fileStore = $request->file('image')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['image'] = $filePath;
        } else {
            unset($data['image']);
        }

        $user = User::where('id', $id)->first();

        $user->update($data);

        return redirect('/personalrea');
    }

    public function getUserReports($id)
    {
        return Report::where('user_id', $id)->get();
    }

    public function deleteReport($id)
    {
        Report::where('id', $id)->first()->delete();
    }

    public function getReport(Request $request)
    {
        $data = $request->all();
        return Report::where('id', $data['id'])->where('user_id', $data['user'])->first();
    }

    public function loginCheck(Request $request)
    {
        $data = $request->all()['formResult'];
        $user = User::where('login', $data['login'])->first();
        if(!$user)
            return false;
        else {
            if(Hash::check($data['password'], $user->password))
                return false;
            else
                return true;
        }
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $user = User::where('login', $data['login'])->first();
        Auth::login($user);
        return redirect('/listreports/');
    }

    public function exit()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getSettings($id)
    {
        return Setting::where('user_id', $id)->first();
    }
}