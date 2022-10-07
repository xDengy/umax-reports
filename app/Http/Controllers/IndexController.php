<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Setting;
use App\Models\Element;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function renderMain()
    {
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

    public function emailExist(Request $request)
    {
        $data = $request->all();
        $user = User::where([
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
        if ($filePath) {
            $data['password'] = Hash::make($data['password']);
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

        $data['user_id'] = auth()->user()->id;
        $settings = Setting::where('user_id', $data['user_id'])->first();

        if ($request->file('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $fileStore = $request->file('logo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['logo'] = $filePath;
        } else {
            $data['logo'] = $settings['logo'];
        }

        if ($request->file('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $fileStore = $request->file('photo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['photo'] = $filePath;
        } else {
            unset($data['photo']);
        }

        $report = Report::create($data);

        return redirect('/reports/' . $report->id);
    }

    public function updateReport(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        if ($request->file('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $fileStore = $request->file('logo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['logo'] = $filePath;
        } else {
            $data['logo'] = $data['hideLogo'];
        }

        if ($request->file('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $fileStore = $request->file('photo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['photo'] = $filePath;
        } else {
            $data['photo'] = $data['hidePhoto'];
        }

        $report = Report::where('id', $data['id'])->first();
        $report->update($data);
        return redirect('/report/' . $report->id);
    }

    public function settings(Request $request)
    {
        $data = $request->all();

        if ($request->file('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $fileStore = $request->file('logo')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
            $data['logo'] = $filePath;
        } else {
            unset($data['logo']);
        }

        if ($request->file('company')) {
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

        if (!$setting)
            Setting::create($data);
        else
            $setting->update($data);

        return redirect('/settings');
    }

    public function reportElements(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $value) {
            $splited = explode('_', $key);
            if (count($splited) > 1) {
                if ($splited[1] == 'report') {
                    $report = $value;
                }
            }
        }

        if (count($data) == 1) {
            $addAr['values'] = null;
        } else {
            $data['0_title'] = $data['title'];
            unset($data['title']);
            $fullAr = [];

            $sort = [];
            foreach ($data as $key => $value) {
                $splited = explode('_', $key);
                if ($splited[1] !== strval(intval($splited[1])) && $splited[1] !== 'title') {
                    $data['0_' . $key] = $value;
                    unset($data[$key]);
                }
                if ($splited[1] == 'sort') {
                    $sort[] = $value;
                }
            }

            foreach ($data as $key => $value) {
                $splited = explode('_', $key);
                $fullAr[$splited[0]]['title'] = $data[$splited[0] . '_title'];
                if (str_contains($key, 'count')) {
                    $fullAr[$splited[0]][$splited[1]]['count'] = $data[$splited[0] . '_' . $splited[1] . '_count'];
                }
                if (str_contains($key, 'elements')) {
                    $elementsKeyData = explode($splited[0] . '_' . $splited[1] . '_elements_', $key)[1];
                    $elements = explode('_', $elementsKeyData);
                    if (str_contains($elementsKeyData, 'type')) {
                        $fullAr[$splited[0]][$splited[1]]['elements'][$elements[0]]['type'] = $value;
                    } else {
                        if ($fullAr[$splited[0]][$splited[1]]['elements'][$elements[0]]['type'] == 'img' && gettype($value) == 'object') {
                            $fileName = time() . '_' . $value->getClientOriginalName();
                            $fileStore = $value
                                ->storeAs('uploads', $fileName, 'public');
                            $filePath = '/storage/' . $fileStore;
                            $value = $filePath;
                        }
                        $fullAr[$splited[0]][$splited[1]]['elements'][$elements[0]]['value'][$elements[2]] = $value;
                    }
                }
            }
            $template = $sort;
            $template = array_combine($template, array_fill(0, count($template), []));
            foreach ($fullAr as $v) {
                $template[$v['title']][] = $v;
            }
            $addAr['values'] = strval(json_encode(array_values($template)));
        }
        $addAr['report_id'] = $report;
        $element = Element::where('report_id', $report)->first();
        if ($element) {
            $element->update($addAr);
        } else {
            Element::create($addAr);
        }
    }

    public function personal(Request $request)
    {
        $data = $request->all();
        $id = auth()->user()->id;

        if ($request->file('image')) {
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

    public function getReportElements(Request $request)
    {
        $data = $request->all();
        $report = Report::where('id', $data['id'])->where('user_id', $data['user'])->first();
        if ($report) {
            return Element::where('report_id', $data['id'])->first();
        } else {
            return [];
        }
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
        if (!$user)
            return false;
        else {
            if (Hash::check($data['password'], $user->password))
                return true;
            else
                return false;
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

    public function changePassword(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', $data['id'])->first();
        $data['password'] = Hash::make($data['password']);
        $data['remember_token'] = null;
        $user->update($data);
        return redirect('/Password');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();
        $updateAr = [];
        $updateAr['remember_token'] = Str::random(30);
        $user->update($updateAr);

        $emailData = [];

        $emailData[] = 'Ссылка на восстановление пароля <a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/newpassword/' . $updateAr['remember_token'] . '">' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/newpassword/' . $updateAr['remember_token'] . '</a>';

        Mail::to($data['email'])
            ->send(new ReqMail($emailData));

        return redirect('/');
    }

    public function getUserByToken($token)
    {
        return User::where('remember_token', $token)->first();
    }
}
