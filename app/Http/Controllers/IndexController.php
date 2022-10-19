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
use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;

class IndexController extends Controller
{
    public function renderMain()
    {
        return view('main.index');
    }

    public function downloadPdf(Request $request)
    {
        $html = $request->all()['html'];    
        $user = $request->all()['user'];

        $html = str_replace('\n', '', $html);

        $res = Browsershot::html($html)
            ->format('A1')
            ->showBackground()
            ->fit(Manipulations::FIT_CONTAIN, 200, 200)
            ->save('pdf/Отчет '.$user.'.pdf');

        return [
            'href' => '/pdf/Отчет '.$user.'.pdf',
            'name' => 'Отчет '.$user.'.pdf'
        ];
    }

    public function previewPdf(Request $request)
    {
        $html = $request->all()['html'];    
        $user = $request->all()['user'];

        $html = str_replace('\n', '', $html);

        $file = fopen('pdf/Отчет '.$user.'.html', 'w');
        fwrite($file, $html);
        fclose($file);

        return [
            'href' => '/pdf/Отчет '.$user.'.html',
        ];
    }

    public function userExist(Request $request)
    {
        $data = $request->all()['formResult'];
        $user = User::where('login', $data['login'])->first();
        $email = User::where('email', $data['email'])->first();

        if($user || $email)
            return false;
        else
            return true;
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
        if($request->file('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $fileStore = $request->file('image')
                ->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $fileStore;
        } else {
            $filePath = '/storage/uploads/user-avatar.jpg';
        }
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

    public function reportElements(Request $request, $preview = false)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (str_contains($key, 'report')) {
                $report = $value;
            }
        }

        if (count($data) == 1) {
            $addAr['values'] = null;
        } else {
            $data['0_title'] = $data['title'];
            unset($data['title']);
            if(array_key_exists('img', $data)) {
                $data['0_img'] = $data['img'];
                unset($data['img']);
            }
            $fullAr = [];

            $sort = [];
            foreach ($data as $key => $value) {
                $splited = explode('_', $key);
                if ($splited[1] !== strval(intval($splited[1])) && $splited[1] !== 'title' && $splited[1] !== 'img') {
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

                if (str_contains($key, 'img')) {
                    if (gettype($value) == 'object') {
                        $fileName = time() . '_' . $value->getClientOriginalName();
                        $fileStore = $value
                            ->storeAs('uploads', $fileName, 'public');
                        $filePath = '/storage/' . $fileStore;
                        $value = $filePath;
                    }
                    $fullAr[$splited[0]]['img'] = $value;
                }

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
        if(!$preview) {
            if ($element) {
                $element->update($addAr);
            } else {
                Element::create($addAr);
            }
        } else {
            return $addAr;
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
        Element::where('report_id', $id)->first()->delete();
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

        $emailData[] = 'Ссылка на восстановление пароля <a href="http://reports.umax.agency/newpassword/' . $updateAr['remember_token'] . '">http://reports.umax.agency/newpassword/' . $updateAr['remember_token'] . '</a>';

        Mail::to($data['email'])
            ->send(new ReqMail($emailData));

        return redirect('/');
    }

    public function getUserByToken($token)
    {
        return User::where('remember_token', $token)->first();
    }

    public function getPdf($report, $preview = false)
    {
        if(!$preview) {
            $curReport = [
                'report' => Report::where('id', $report)->first(),
                'elements' => Element::where('report_id', $report)->first()
            ];
        } else {
            $curReport = $preview;
            $curReport['report'] = Report::where('id', $curReport['report_id'])->first();
            unset($curReport['report_id']);
            $curReport['elements'] = (object) ['values' => $curReport['values']];
            unset($curReport['values']);
        }
        $curReport['user'] = User::where('id', $curReport['report']->user_id)->first();
        $curReport['elements']->values = json_decode($curReport['elements']->values, true);

        $date = date_create($curReport['report']->dateStart);
        $dateStart = date_format($date, "d.m.Y");
        $date = date_create($curReport['report']->dateEnd);
        $dateEnd = date_format($date, "d.m.Y");
        $footer = '
        <div class="footer">
          <div class="footer__contacts">
            <a href="tel:' . $curReport['report']->phone . '">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.49125 0.00685904C6.43861 0.0130387 6.27865 0.0307575 6.13578 0.0462614C5.23363 0.144152 4.2346 0.482668 3.42845 0.963671C2.40246 1.57582 1.56855 2.40972 0.956409 3.43571C0.479343 4.23527 0.162483 5.16444 0.0332021 6.14304C-0.0110674 6.47809 -0.0110674 7.50331 0.0332021 7.83835C0.162483 8.81696 0.479343 9.74613 0.956409 10.5457C1.56855 11.5717 2.40246 12.4056 3.42845 13.0177C4.22801 13.4948 5.15718 13.8117 6.13578 13.9409C6.47082 13.9852 7.49605 13.9852 7.83109 13.9409C9.53373 13.716 10.977 12.9682 12.1548 11.7006C12.8065 10.9993 13.3162 10.1271 13.6291 9.1782C13.8757 8.43021 13.968 7.83461 13.968 6.9907C13.968 6.36639 13.9417 6.09057 13.8296 5.54148C13.4454 3.65884 12.2358 1.9764 10.5384 0.963671C9.74701 0.491472 8.80327 0.167914 7.85844 0.0448122C7.61863 0.0135856 6.66078 -0.0130199 6.49125 0.00685904ZM7.95414 0.890773C8.60774 0.999957 9.09035 1.15346 9.6768 1.43877C10.4614 1.82043 11.1564 2.35815 11.6929 2.99851C13.1166 4.69782 13.5346 6.96945 12.8074 9.05515C12.5919 9.67326 12.1506 10.4366 11.6929 10.9829C10.6771 12.1954 9.13785 12.9967 7.54398 13.1428C5.90907 13.2926 4.27337 12.7743 2.99125 11.7002C1.77877 10.6843 0.977464 9.14511 0.831366 7.55125C0.681522 5.91634 1.19982 4.28063 2.27397 2.99851C3.08553 2.02983 4.27583 1.29199 5.50906 0.993121C5.78165 0.927086 6.22946 0.851699 6.49125 0.827828C6.78555 0.800976 7.63542 0.837535 7.95414 0.890773ZM4.58222 2.82247C4.32836 2.8908 4.19358 2.99356 3.6738 3.5152C3.2074 3.98327 3.15785 4.04247 3.0534 4.25632C2.90192 4.56646 2.85439 4.75625 2.83528 5.12755C2.71798 7.40575 5.44054 10.5149 8.04984 11.0825C8.36845 11.1518 9.05314 11.1525 9.30766 11.0837C9.55408 11.0172 9.79992 10.8978 9.98496 10.7548C10.2689 10.5354 10.9816 9.78192 11.0666 9.61127C11.1777 9.38842 11.2138 9.14457 11.172 8.90052C11.114 8.56283 11.0225 8.43002 10.4572 7.86313C10.0349 7.43955 9.9204 7.34012 9.77143 7.26747C9.51749 7.14363 9.27914 7.11137 9.01543 7.16515C8.74085 7.22115 8.57517 7.32541 8.26348 7.63842L8.00951 7.89345L7.04641 6.93062L6.08331 5.96782L6.36262 5.67946C6.67533 5.35661 6.77461 5.18924 6.8179 4.91211C6.85457 4.67731 6.81546 4.43119 6.705 4.20164C6.6336 4.0533 6.53533 3.93966 6.11101 3.51471C5.71332 3.11642 5.56684 2.9876 5.43851 2.9234C5.1531 2.78058 4.86438 2.74654 4.58222 2.82247ZM5.00607 3.62876C5.0484 3.64451 5.28323 3.85678 5.52787 4.10044C6.16977 4.73965 6.16944 4.73104 5.574 5.32273C5.35454 5.5408 5.15739 5.75244 5.13587 5.79304C5.08504 5.88891 5.086 6.04384 5.13809 6.15357C5.16084 6.20153 5.76683 6.82691 6.48477 7.54334C7.6296 8.68579 7.80268 8.84824 7.89262 8.8647C8.11839 8.90607 8.16584 8.87739 8.63683 8.41457C9.09063 7.96862 9.14367 7.934 9.32133 7.96794C9.43417 7.98946 10.305 8.84674 10.3488 8.97938C10.4107 9.16693 10.379 9.21667 9.88852 9.70251C9.63671 9.95192 9.39324 10.1749 9.34747 10.1981C8.7368 10.5069 7.63788 10.2475 6.55961 9.53993C4.86435 8.42748 3.58609 6.50529 3.65513 5.17234C3.67873 4.71709 3.71602 4.6486 4.21901 4.13664C4.75785 3.58821 4.80887 3.55528 5.00607 3.62876Z" fill="#505050"/>
                </svg>            
              ' . $curReport['report']->phone . '
            </a>
            <a href="' . $curReport['report']->link . '" target="blank">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.49125 0.00685904C6.43861 0.0130387 6.27865 0.0307575 6.13578 0.0462614C5.23363 0.144152 4.2346 0.482668 3.42845 0.963671C2.40246 1.57582 1.56855 2.40972 0.956409 3.43571C0.479343 4.23527 0.162483 5.16444 0.0332021 6.14304C-0.0110674 6.47809 -0.0110674 7.50331 0.0332021 7.83835C0.162483 8.81696 0.479343 9.74613 0.956409 10.5457C1.56855 11.5717 2.40246 12.4056 3.42845 13.0177C4.22801 13.4948 5.15718 13.8117 6.13578 13.9409C6.47082 13.9852 7.49605 13.9852 7.83109 13.9409C9.53373 13.716 10.977 12.9682 12.1548 11.7006C12.8065 10.9993 13.3162 10.1271 13.6291 9.1782C13.8757 8.43021 13.968 7.83461 13.968 6.9907C13.968 6.36639 13.9417 6.09057 13.8296 5.54148C13.4454 3.65884 12.2358 1.9764 10.5384 0.963671C9.74701 0.491472 8.80327 0.167914 7.85844 0.0448122C7.61863 0.0135856 6.66078 -0.0130199 6.49125 0.00685904ZM6.5662 3.67095C6.54241 3.69477 4.48646 3.56108 4.44818 3.53325C4.43084 3.52064 4.67921 2.93043 4.82033 2.64895C5.27289 1.74611 5.87035 1.1125 6.4624 0.907507L6.55961 0.873847L6.56669 2.26862C6.5706 3.03573 6.57038 3.66679 6.5662 3.67095ZM7.72437 1.00307C8.22911 1.25764 8.75307 1.86399 9.14655 2.64895C9.3166 2.98815 9.53398 3.51957 9.51178 3.54178C9.49031 3.56324 8.36834 3.64697 7.86527 3.66466L7.39359 3.68126V2.27469V0.868132L7.49878 0.905238C7.55664 0.925664 7.65817 0.969687 7.72437 1.00307ZM4.69758 1.28269C4.68684 1.3015 4.62023 1.39685 4.54954 1.4946C4.25021 1.90862 3.93863 2.51961 3.71641 3.12839C3.65701 3.29103 3.59891 3.40867 3.57791 3.40867C3.46282 3.40867 2.23965 3.13102 2.20585 3.09722C2.18595 3.07734 2.47538 2.75316 2.72295 2.518C3.18378 2.08034 3.67665 1.73835 4.26202 1.45012C4.6838 1.24244 4.73097 1.22428 4.69758 1.28269ZM9.70485 1.45012C10.2901 1.73827 10.7791 2.07757 11.2466 2.51975C11.5058 2.76494 11.8034 3.11191 11.776 3.13703C11.7311 3.17835 10.3853 3.45988 10.3635 3.43251C10.3591 3.42693 10.3088 3.29314 10.2518 3.13523C10.0327 2.52836 9.71951 1.91255 9.41733 1.4946C9.26073 1.27802 9.24337 1.24851 9.27257 1.24851C9.28515 1.24851 9.47968 1.33924 9.70485 1.45012ZM1.94519 3.8851C2.20495 3.96284 2.92366 4.13068 3.19264 4.17643L3.38035 4.20834L3.36602 4.30754C3.35812 4.36209 3.32058 4.57283 3.2826 4.77586C3.19906 5.22235 3.1353 5.76214 3.1106 6.23191L3.09228 6.58054H1.9617H0.831093V6.4815C0.831093 6.1737 0.986597 5.42959 1.14995 4.95578C1.28872 4.55328 1.64561 3.81882 1.70243 3.81882C1.71419 3.81882 1.82342 3.84866 1.94519 3.8851ZM12.5476 4.31757C12.7453 4.72762 12.8799 5.09988 12.9813 5.51632C13.0561 5.82359 13.1358 6.32138 13.1358 6.4815V6.58054H12.0052H10.8746L10.8563 6.23191C10.8317 5.76384 10.768 5.22372 10.6846 4.77586C10.6468 4.57283 10.6093 4.36808 10.6013 4.32083L10.5866 4.23497L10.788 4.20218C11.0569 4.15835 11.7805 3.99803 12.0694 3.91827C12.3466 3.84168 12.2992 3.80209 12.5476 4.31757ZM4.63611 4.37825C4.97312 4.41511 5.44048 4.44765 6.25199 4.49074L6.57328 4.5078V5.54419V6.58054H5.24711H3.92094V6.43455C3.92094 5.87559 4.15306 4.33836 4.23747 4.33836C4.25601 4.33836 4.43541 4.35632 4.63611 4.37825ZM9.7725 4.37636C9.7725 4.38221 9.79659 4.50409 9.82604 4.64718C9.93905 5.19648 10.0459 6.06522 10.0459 6.43455V6.58054H8.71976H7.39359V5.54498V4.50942L7.83793 4.49107C8.36506 4.4693 9.48055 4.39241 9.49679 4.37672C9.51142 4.36255 9.7725 4.36223 9.7725 4.37636ZM3.12291 7.87325C3.15928 8.39062 3.23529 8.96194 3.32301 9.37699C3.38404 9.66568 3.37885 9.72507 3.29263 9.72507C3.1943 9.72507 2.29366 9.91539 1.9946 9.99936C1.83559 10.044 1.68662 10.0805 1.66352 10.0805C1.60344 10.0805 1.2725 9.38965 1.13647 8.98023C0.969999 8.47932 0.831093 7.80595 0.831093 7.49989V7.40085H1.96042H3.08971L3.12291 7.87325ZM6.57328 8.42625V9.45164L6.25199 9.45177C5.85901 9.45191 5.16647 9.49303 4.62132 9.54857C4.39746 9.57137 4.21111 9.58658 4.20725 9.58237C4.20337 9.57813 4.16815 9.41839 4.12897 9.22736C4.04327 8.80958 3.9587 8.16131 3.93261 7.72214L3.9135 7.40085H5.24339H6.57328V8.42625ZM10.0343 7.72214C10.0082 8.16107 9.92218 8.82128 9.8375 9.23289C9.79883 9.42087 9.76282 9.58179 9.75749 9.59046C9.75213 9.59913 9.66414 9.59612 9.5619 9.58376C9.12894 9.53142 8.41051 9.47769 7.91996 9.46093L7.39359 9.44297V8.42193V7.40085H8.72348H10.0534L10.0343 7.72214ZM13.1358 7.49989C13.1358 7.80737 12.9968 8.4794 12.8286 8.98559C12.6841 9.42035 12.3294 10.1464 12.2722 10.1245C12.0783 10.0501 10.7025 9.72507 10.5814 9.72507C10.5756 9.72507 10.5947 9.61742 10.6239 9.48582C10.7112 9.09171 10.8083 8.3808 10.8438 7.87568L10.8772 7.40085H12.0065H13.1358V7.49989ZM6.57328 11.6665C6.57328 12.4335 6.56863 13.061 6.56294 13.061C6.53762 13.061 6.32872 12.9698 6.20414 12.9044C5.70575 12.6425 5.17574 12.0194 4.80769 11.2624C4.66605 10.9712 4.43226 10.4069 4.44752 10.3931C4.45581 10.3856 5.48978 10.3017 5.71195 10.2905C5.80219 10.286 6.03291 10.28 6.22465 10.2771L6.57328 10.2719V11.6665ZM8.85648 10.3413C9.09711 10.3628 9.34512 10.3873 9.40762 10.3958L9.52127 10.4112L9.41667 10.6796C8.99801 11.754 8.38628 12.5768 7.76273 12.9044C7.63816 12.9698 7.42925 13.061 7.40393 13.061C7.39824 13.061 7.39359 12.4318 7.39359 11.6628V10.2647L7.90629 10.2835C8.18828 10.2939 8.61586 10.3199 8.85648 10.3413ZM3.66347 10.6619C3.89168 11.3503 4.23446 12.003 4.73857 12.709C4.77639 12.762 4.77499 12.762 4.63742 12.7077C3.99928 12.4562 3.26903 11.9802 2.71899 11.4572C2.46844 11.2189 2.12309 10.8277 2.14668 10.8087C2.19027 10.7737 3.56128 10.4907 3.59757 10.5093C3.60769 10.5145 3.63735 10.5831 3.66347 10.6619ZM10.7022 10.587C11.0284 10.6482 11.7507 10.8214 11.776 10.8445C11.8057 10.8716 11.4956 11.2276 11.209 11.4955C10.674 11.9956 9.94777 12.464 9.32945 12.7077C9.19188 12.762 9.19049 12.762 9.2283 12.709C9.7325 12.0029 10.0752 11.3503 10.3035 10.6616C10.3443 10.5385 10.3595 10.5199 10.4104 10.5308C10.4431 10.5377 10.5744 10.563 10.7022 10.587Z" fill="#505050"/>
                </svg>            
              ' . $curReport['report']->link . '
            </a>
            <a href="mailto:' . $curReport['report']->email . '">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="14" height="14" fill="url(#pattern0)" />
                <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_45_29" transform="scale(0.00195312)" />
                  </pattern>
                  <image id="image0_45_29" width="512" height="512"
                    xlink:href="data:image/png;base64,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" />
                </defs>
              </svg>
              ' . $curReport['report']->email . '
            </a>
          </div>
          <div>
            <svg width="249" height="86" viewBox="0 0 249 86" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M132.783 48.6879C128.516 48.6879 125.253 47.5029 122.994 45.37C120.735 43.237 119.48 39.9191 119.48 35.6531V19.0634H126.257V35.6531C126.257 38.0231 126.759 39.6821 128.014 41.104C129.269 42.289 130.775 43 132.783 43C134.791 43 136.548 42.289 137.552 41.104C138.807 39.919 139.309 38.2601 139.309 35.8901V19.0634H146.087V35.6531C146.087 39.9191 144.832 43.237 142.573 45.37C140.062 47.7399 136.799 48.6879 132.783 48.6879ZM152.864 48.4509V19.3004H160.143L168.175 31.6242L176.208 19.3004H183.487V48.4509H176.71V29.4912L168.175 42.052H167.924L159.39 29.7282V48.6879H152.864V48.4509ZM219.13 48.4509L229.923 33.5202L219.632 19.3004H227.413L233.94 28.7802L240.466 19.3004H247.996L237.705 33.5202L248.247 48.4509H240.466L233.689 38.4971L226.66 48.4509H219.13ZM185.746 48.4509L198.798 19.0634H205.074L218.126 48.4509H211.098L208.839 43.237H194.782L192.523 48.4509H185.746ZM197.292 37.5491H206.329L201.811 26.8843L197.292 37.5491ZM119.229 57.6937H122.743C126.006 57.6937 128.265 59.8267 128.265 62.6707C128.265 65.5146 126.006 67.6476 122.743 67.6476H119.229V57.6937ZM122.743 66.4626C125.253 66.4626 127.01 64.8036 127.01 62.6707C127.01 60.5377 125.253 58.8787 122.743 58.8787H120.233V66.4626H122.743ZM131.026 57.6937H132.281V67.4106H131.026V57.6937ZM134.791 62.6707C134.791 60.0637 136.799 57.6937 140.062 57.6937C141.82 57.6937 142.824 58.1677 143.828 59.1157L143.075 59.8267C142.322 59.1157 141.318 58.6417 139.812 58.6417C137.552 58.6417 135.795 60.5377 135.795 62.6707C135.795 65.0406 137.301 66.6996 139.812 66.6996C141.067 66.6996 142.071 66.2256 142.824 65.7516V63.3816H139.56V62.4337H143.828V66.4626C142.824 67.1736 141.318 67.8846 139.56 67.8846C136.799 67.6476 134.791 65.5146 134.791 62.6707ZM146.84 57.6937H148.095V67.4106H146.84V57.6937ZM153.868 58.8787H150.354V57.9307H158.637V58.8787H155.123V67.6476H153.868V58.8787ZM163.406 57.6937H164.41L169.179 67.6476H167.924L166.669 65.0406H160.896L159.641 67.6476H158.386L163.406 57.6937ZM166.167 64.0926L163.908 59.1157L161.398 64.0926H166.167ZM171.188 57.6937H172.443V66.4626H178.216V67.4106H171.188V57.6937ZM188.758 57.6937H189.762L194.531 67.6476H193.276L192.021 65.0406H186.248L184.993 67.6476H183.738L188.758 57.6937ZM191.519 64.0926L189.26 59.1157L187.001 64.0926H191.519ZM195.535 62.6707C195.535 60.0637 197.543 57.6937 200.806 57.6937C202.564 57.6937 203.568 58.1677 204.572 59.1157L203.819 60.0637C203.066 59.3527 202.062 58.8787 200.555 58.8787C198.296 58.8787 196.539 60.7747 196.539 62.9077C196.539 65.2776 198.045 66.9366 200.555 66.9366C201.811 66.9366 202.815 66.4626 203.568 65.9886V63.6186H200.806V62.6707H205.074V66.6996C204.07 67.4106 202.564 68.1216 200.806 68.1216C197.543 67.6476 195.535 65.5146 195.535 62.6707ZM207.584 57.6937H215.114V58.6417H208.839V61.9597H214.612V62.9077H208.839V66.4626H215.365V67.4106H207.835V57.6937H207.584ZM217.624 57.6937H218.628L225.154 65.5146V57.6937H226.409V67.6476H225.405L218.628 59.5897V67.6476H217.373V57.6937H217.624ZM228.919 62.6707C228.919 59.8267 231.178 57.6937 234.191 57.6937C236.199 57.6937 237.203 58.4047 238.207 59.3527L237.454 60.0637C236.701 59.3527 235.697 58.6417 234.191 58.6417C231.931 58.6417 230.174 60.3007 230.174 62.6707C230.174 65.0406 231.931 66.6996 234.191 66.6996C235.697 66.6996 236.45 66.2256 237.454 65.2776L238.207 65.9886C237.203 66.9366 235.948 67.6476 233.94 67.6476C231.178 67.6476 228.919 65.5146 228.919 62.6707ZM243.478 63.6186L239.211 57.6937H240.717L244.231 62.6707L247.745 57.6937H249L244.733 63.6186V67.4106H243.478V63.6186ZM37.9022 42.763C35.8942 42.763 33.8861 42.289 32.6311 41.104C31.376 39.919 30.874 38.2601 30.874 36.1271V27.5953H34.3881V35.8901C34.3881 37.0751 34.6391 38.0231 35.1411 38.4971C35.6431 39.2081 36.8982 39.4451 37.9022 39.4451C38.9063 39.4451 39.9103 39.2081 40.6633 38.4971C41.1653 37.7861 41.4163 37.0751 41.4163 35.8901V27.3583H44.9304V35.6531C44.9304 37.7861 44.4284 39.4451 43.1734 40.63C41.9184 42.052 40.1613 42.763 37.9022 42.763ZM52.9627 42.526V27.8323H56.7278L60.744 33.2832L64.7601 27.8323H68.5252V42.526H65.2621V32.8092L60.995 38.2601L56.7278 32.8092V42.289H52.9627V42.526ZM30.121 63.1446L36.6472 48.2139H39.9103L46.4365 63.1446H42.9224L41.6673 60.5377H34.6391L33.6351 63.1446H30.121ZM35.8942 57.6937H40.4123L38.4042 52.2428L35.8942 57.6937ZM53.2137 63.1446L58.4849 55.5608L53.2137 48.2139H57.2298L60.493 52.9538L63.7561 48.2139H67.5212L62.25 55.3238L67.5212 62.9077H63.505L59.9909 57.9307L56.4768 62.9077H53.2137V63.1446ZM63.505 5.55465L61.497 2.94769C59.4889 0.814732 56.2258 -0.370248 53.2137 0.103744L19.5786 4.60667C16.5665 5.31765 14.0565 7.21362 13.0524 10.0576L0.502016 43C-0.502016 45.8439 0 48.9249 2.00806 51.0579L24.8498 76.1794C25.8538 77.3644 27.1089 78.0754 28.3639 78.5494C29.619 79.4974 31.125 80.2084 32.6311 80.4454L67.2702 85.8963C70.2823 86.3702 73.5454 85.1853 75.5534 83.0523L99.6502 53.1908C101.658 50.8209 102.16 47.7399 101.156 45.133L87.0998 18.3524C86.0958 15.5085 83.3347 13.6125 80.3226 13.1385L77.0595 12.9015L75.0514 9.58358C73.5454 6.97662 70.5333 5.55465 67.5212 5.55465H63.505ZM7.53024 38.9711C6.02419 41.578 6.02419 44.659 7.53024 47.2659L22.5907 71.2025L3.51411 50.1099C1.75706 48.2139 1.25504 45.8439 2.25907 43.474L14.8095 10.5316C15.5625 8.3986 17.5706 6.73963 20.0806 6.26564L53.7157 1.76272C56.2258 1.28872 58.7359 2.23671 60.2419 3.89568L61.497 5.55465L32.129 5.79165C29.1169 5.79165 26.1048 7.45062 24.5988 10.0576L7.53024 38.9711ZM15.0605 36.1271C13.0524 38.4971 12.5504 41.578 13.5544 44.185L23.8458 70.2545L8.78528 46.3179C7.53024 44.185 7.53024 41.815 8.78528 39.6821L26.1048 10.7686C27.3599 8.6356 29.619 7.45062 32.129 7.45062L62.752 7.21362L66.2661 11.9535L43.6754 10.0576C40.6633 9.58358 37.6512 10.7686 35.6431 12.9015L15.0605 36.1271ZM74.8004 12.6645L68.5252 11.9535L64.7601 7.21362H67.2702C69.7802 7.21362 72.0393 8.3986 73.2944 10.5316L74.8004 12.6645ZM92.873 47.9769C94.379 45.37 94.379 42.289 92.873 39.6821L77.8125 14.3235L79.8206 14.5605C82.3307 15.0345 84.3387 16.6935 85.0917 18.8264L85.3428 19.0634L99.3992 45.8439C100.152 47.9769 99.9012 50.5839 98.1442 52.2428L74.0474 82.1043C72.5413 84.0003 70.0312 84.7113 67.5212 84.4743L38.1532 79.9714L68.0232 79.7344C71.0353 79.7344 74.0474 78.0754 75.5534 75.4684L92.873 47.9769ZM43.6754 11.7165L67.7722 13.6125L82.3307 32.5722C84.0877 34.4681 84.3387 36.8381 83.5857 39.2081L72.7923 66.9366C72.0393 69.0695 70.0312 70.7285 67.5212 71.2025L33.1331 77.3644C31.878 77.6014 30.874 77.6014 29.619 77.1274C28.8659 76.4164 28.1129 75.4684 27.8619 74.5204L15.3115 43.711C14.8095 42.526 14.8095 41.341 15.0605 40.393C15.0605 39.2081 15.5625 38.0231 16.3155 37.0751L36.8982 14.0865C38.4042 12.1905 40.9143 11.2426 43.6754 11.7165ZM83.5857 31.6242L70.0312 13.8495L75.8044 14.3235L91.3669 40.63C92.622 42.763 92.622 45.133 91.3669 47.2659L74.0474 74.5204C72.7923 76.6534 70.5333 77.8384 68.0232 77.8384L38.1532 78.0754L67.7722 72.8615C70.7843 72.3875 73.2944 70.2545 74.2984 67.4106L85.0917 39.4451C86.0958 36.8381 85.5938 33.7572 83.5857 31.6242Z"
                fill="#302C3B" fill-opacity="0.25" />
            </svg>
          </div>
        </div>
        ';
        $html = '
            <div>
            <div class="' . $curReport['report']->color . '">
            <link rel="stylesheet" href="http://reports.umax.agency/pdf.css" />
        ';
        $html .= '
        
            <section class="report" style="background-image: url(\'http://reports.umax.agency' . $curReport['report']->logo . '\'), url(\'http://reports.umax.agency/img/pdfBack.png\'), radial-gradient(26.44% 37.5% at 21.35% 100%, var(--main-lightColorOpacity) 0%, rgba(122, 175, 255, 0) 100%), radial-gradient(36.03% 59.54% at 79.95% -3.94%, var(--main-lightColor) 0%, rgba(121, 175, 255, 0) 100%);">
                <div class="report__item">
                <svg width="254" height="93" viewBox="0 0 254 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                    d="M11.2457 14.1619L0.398436 49.4344C-0.557083 52.3504 0.245374 55.5041 2.38361 57.7741L27.3531 84.8881C29.4914 87.1581 32.5715 88.1802 35.5105 87.4641L71.5525 79.2215C74.4915 78.5055 76.9941 76.2896 77.9496 73.3736L88.9516 38.1713C89.9071 35.2553 89.1047 32.1017 86.9666 29.8316L61.7719 2.80169C59.6337 0.531757 56.5536 -0.490321 53.6146 0.22572L17.5726 8.46832C14.6336 9.18436 12.131 11.4002 11.2457 14.1619Z"
                    fill="url(#paint0_linear_12_6)" />
                    <path
                    d="M27.2127 10.8942L8.22725 42.6023C6.65964 45.2204 6.63822 48.561 8.04317 51.1717L26.2156 83.2821C27.7665 85.9798 30.5389 87.6286 33.5114 87.6212L70.5823 88.169C73.7007 88.2484 76.4945 86.5568 78.0621 83.9387L97.0477 52.2305C98.6153 49.6124 98.6367 46.2719 97.2317 43.6611L79.1463 11.4053C77.5955 8.70778 74.823 7.05892 71.8505 7.0662L34.6926 6.66391C31.72 6.67134 28.7803 8.27607 27.2127 10.8942Z"
                    fill="url(#paint1_linear_12_6)" />
                    <path
                    d="M33.4037 89.0609C50.8555 91.7086 72.5273 92.2468 72.5273 92.2468C75.7245 92.8156 78.8657 91.5108 80.8908 89.0609L105.415 59.3905C107.44 56.9406 107.987 53.5058 106.952 50.5994L93.9045 21.5568C93.9045 21.5568 92.092 17.8126 91.1473 16.1823C90.2025 14.5522 87.2309 14.2625 86.674 14.2897C80.8455 14.5736 62.3133 14.8151 60.1719 14.4902C28.6199 9.35322 27.2606 52.1454 27.2606 52.1454C27.2606 52.1454 25.7875 87.9054 33.4037 89.0609Z"
                    fill="#C23165" />
                    <path
                    d="M33.4031 88.9821C50.5982 89.0143 72.3076 89.3887 72.3076 89.3887C75.4701 89.475 78.3 87.7683 79.8847 85.1217L99.0771 53.068C100.662 50.4213 100.677 47.0406 99.2473 44.3958L81.0488 14.8048C81.0488 14.2113 72.1476 14.6621 64.9683 13.6179C34.1519 9.13575 22.759 57.3574 22.759 57.3574C22.759 57.3574 25.8991 88.968 33.4031 88.9821Z"
                    fill="#78215C" />
                    <path
                    d="M36.3494 14.1668L19.6344 38.0656C17.3957 40.0604 17.3591 44.0942 17.9385 46.9853L27.6077 81.9276C28.0837 84.0013 29.0399 86.1649 30.5063 87.6064C31.794 88.8724 33.758 88.8445 35.5236 88.4558L73.3235 80.1348C77.0188 79.2882 80.9171 77.4649 83.1558 75.4701L85.0501 71.7437C87.0691 67.5941 92.0757 50.4995 92.9503 46.9853C92.9503 46.9853 93.5465 44.8292 93.5465 43.7883C93.5465 42.7473 93.3854 42.5123 93.1739 42.3012C92.9624 42.0903 73.3823 15.1029 71.5191 14.1668L46.3689 12.3135C41.145 11.8388 38.5881 12.1721 36.3494 14.1668Z"
                    fill="url(#paint2_linear_12_6)" />
                    <path
                    d="M41.7108 48.9847C39.6077 48.9847 37.6152 48.4273 36.5083 47.2009C35.2907 45.9744 34.7373 44.302 34.7373 41.9607V32.9297H38.1687V41.8491C38.1687 43.0756 38.5008 44.0791 39.0541 44.748C39.6077 45.4169 40.7146 45.7514 41.8215 45.7514C42.9284 45.7514 43.9246 45.4169 44.5887 44.748C45.1422 44.0791 45.4743 43.1871 45.4743 41.9607V32.9297H48.9057V41.8491C48.9057 44.1905 48.3523 45.9744 47.1347 47.2009C45.6956 48.4273 43.814 48.9847 41.7108 48.9847ZM56.7647 48.8731V33.0413H60.4176L64.5131 38.8389L68.6087 33.0413H72.2615V48.8731H68.8301V38.5044L64.4024 44.4135H64.2918L59.9748 38.6158V48.8731H56.7647ZM33.7411 70.9487L40.3826 55.0053H43.5925L50.2339 70.9487H46.6918L45.4743 68.05H38.3901L37.2832 70.9487H33.7411ZM39.6077 65.0396H44.2567L41.9322 59.242L39.6077 65.0396ZM57.0969 70.9487L62.5208 62.9213L57.3183 55.1167H61.303L64.6238 60.2454L67.9445 55.1167H71.8188L66.6163 62.8098L72.0401 70.9487H68.0552L64.5131 65.4856L60.971 70.9487H57.0969Z"
                    fill="white" />
                    <path
                    d="M141.255 54.9883C137.204 54.9883 134.018 53.8254 131.741 51.4996C129.466 49.174 128.328 45.7783 128.328 41.3129V23.7768H134.883V41.1734C134.883 43.6387 135.429 45.4992 136.567 46.8016C137.705 48.1041 139.252 48.7553 141.301 48.7553C143.349 48.7553 144.941 48.1041 146.034 46.8482C147.172 45.5923 147.719 43.7782 147.719 41.3595V23.7768H154.272V41.1269C154.272 45.6853 153.136 49.174 150.814 51.4996C148.537 53.8254 145.305 54.9883 141.255 54.9883ZM160.827 54.7556V24.0094H167.882L175.711 37.0336L183.54 24.0094H190.596V54.7556H184.087V34.6614L175.711 47.7784H175.529L167.199 34.7543V54.7092H160.827V54.7556ZM225.461 54.7556L235.839 39.1267L225.871 24.0094H233.563L239.845 33.9636L246.171 24.0094H253.636L243.622 39.0337L254 54.7556H246.308L239.616 44.1968L232.88 54.7556H225.461ZM193.008 54.6627L205.798 23.6838H211.851L224.641 54.6627H217.768L215.447 49.0344H201.838L199.653 54.6627H193.008ZM204.25 43.0805H213.171L208.802 31.8239L204.25 43.0805Z"
                    fill="#302C3B" />
                    <path
                    d="M128.328 63.6984H131.808C134.972 63.6984 137.185 65.7681 137.185 68.5277C137.185 71.2442 135.016 73.357 131.808 73.357H128.328V63.6984ZM131.808 72.3222C134.339 72.3222 135.966 70.6837 135.966 68.5277C135.966 66.4148 134.339 64.7333 131.808 64.7333H129.458V72.3652H131.808V72.3222ZM139.716 63.6984H140.845V73.3139H139.716V63.6984ZM143.332 68.4846C143.332 65.8543 145.365 63.5258 148.393 63.5258C150.109 63.5258 151.149 64.0003 152.143 64.8195L151.42 65.6387C150.652 64.9919 149.794 64.5176 148.347 64.5176C146.132 64.5176 144.506 66.3286 144.506 68.4846C144.506 70.7699 146.042 72.4946 148.483 72.4946C149.612 72.4946 150.696 72.0635 151.375 71.5461V69.1745H148.301V68.1828H152.46V72.0203C151.51 72.7965 150.109 73.4864 148.393 73.4864C145.32 73.4864 143.332 71.2873 143.332 68.4846ZM155.171 63.6984H156.3V73.3139H155.171V63.6984ZM161.95 64.6902H158.559V63.6984H166.468V64.6902H163.079V73.3139H161.95V64.6902ZM171.032 63.6121H172.116L176.68 73.3139H175.461L174.286 70.7699H168.817L167.644 73.3139H166.468L171.032 63.6121ZM173.834 69.7781L171.529 64.8627L169.224 69.7781H173.834ZM178.67 63.6984H179.799V72.3222H185.493V73.3139H178.67V63.6984ZM195.661 63.6121H196.745L201.355 73.3139H200.134L198.959 70.7699H193.401L192.227 73.3139H191.051L195.661 63.6121ZM198.462 69.7781L196.158 64.8627L193.853 69.7781H198.462ZM202.258 68.4846C202.258 65.8543 204.291 63.5258 207.319 63.5258C209.037 63.5258 210.076 64.0003 211.07 64.8195L210.348 65.6387C209.579 64.9919 208.72 64.5176 207.274 64.5176C205.059 64.5176 203.433 66.3286 203.433 68.4846C203.433 70.7699 204.969 72.4946 207.41 72.4946C208.54 72.4946 209.624 72.0635 210.302 71.5461V69.1745H207.229V68.1828H211.386V72.0203C210.438 72.7965 209.037 73.4864 207.319 73.4864C204.247 73.4864 202.258 71.2873 202.258 68.4846ZM214.008 63.6984H221.283V64.6902H215.137V67.9672H220.65V68.959H215.137V72.3222H221.374V73.3139H214.008V63.6984ZM223.677 63.6984H224.763L231.133 71.4167V63.6984H232.265V73.3139H231.361L224.853 65.4232V73.3139H223.677V63.6984ZM234.568 68.4846C234.568 65.7681 236.693 63.5258 239.675 63.5258C241.483 63.5258 242.567 64.1728 243.561 65.0782L242.792 65.8543C241.934 65.0782 240.986 64.5176 239.629 64.5176C237.416 64.5176 235.743 66.2425 235.743 68.4846C235.743 70.7268 237.416 72.4515 239.629 72.4515C241.03 72.4515 241.934 71.9341 242.884 71.0717L243.652 71.8047C242.612 72.8396 241.437 73.4433 239.629 73.4433C236.737 73.4864 234.568 71.2873 234.568 68.4846ZM248.668 69.5195L244.465 63.6984H245.866L249.255 68.5277L252.689 63.6984H254L249.797 69.5195V73.357H248.668V69.5195Z"
                    fill="#302C3B" />
                    <defs>
                    <linearGradient id="paint0_linear_12_6" x1="31.0829" y1="87.248" x2="57.9199" y2="0.426298"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F9B236" />
                        <stop offset="0.1356" stop-color="#F8AC38" />
                        <stop offset="0.3129" stop-color="#F69C40" />
                        <stop offset="0.5134" stop-color="#F3814B" />
                        <stop offset="0.7309" stop-color="#EE5B5B" />
                        <stop offset="0.9598" stop-color="#E82B70" />
                        <stop offset="1" stop-color="#E72274" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_12_6" x1="29.2776" y1="86.4492" x2="75.7586" y2="8.2956"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#36A9E1" />
                        <stop offset="0.1074" stop-color="#488FCF" />
                        <stop offset="0.2998" stop-color="#6367B3" />
                        <stop offset="0.4892" stop-color="#79489D" />
                        <stop offset="0.6721" stop-color="#88318E" />
                        <stop offset="0.8456" stop-color="#922484" />
                        <stop offset="1" stop-color="#6E378B" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_12_6" x1="29.6194" y1="85.9281" x2="96.1287" y2="26.2648"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#4175BA" />
                        <stop offset="0.0355203" stop-color="#4270B6" />
                        <stop offset="0.3016" stop-color="#4B4F9F" />
                        <stop offset="0.5573" stop-color="#51388E" />
                        <stop offset="0.7958" stop-color="#552A84" />
                        <stop offset="1" stop-color="#562580" />
                    </linearGradient>
                    </defs>
                </svg>
                </div>
                <div class="report__item report__item--report">
                <p class="report__item__text">отчёт</p>
                <p>о продвижении</p>
                <p>сайта</p>
                </div>
                <div class="report__item report__item--site">
                <a href="' . $curReport['report']->link . '" target="blank" class="report__item__text">' . $curReport['report']->link . '</a>
                </div>
                <div class="report__item report__item--date">
                <p>Отчетный период:</p>
                <p>' . $dateStart . ' - ' . $dateEnd . '</p>
                </div>
            </section>
        
        ';
        $elementHtml = '';
        $pageCount = 3;
        foreach ($curReport['elements']->values as $key => $element) {
            $element = $element[0];
            if ($key > 0) {
                $pageCount += 1;
            }
            $curTitle = $element['title'];
            foreach(array_column($element, 'elements') as $elementElement) {
                $elementElementKey = array_search('h1', array_column($elementElement, 'type'));
                if(isset($elementElement[$elementElementKey])) {
                    $curTitle = $elementElement[$elementElementKey]['value'][0];
                    break;
                }
            }
            $elementHtml .= '
            <li>
                <a sub-id="'.$pageCount.'" href="#' . $pageCount . '">' . ($key + 1) . '. ' . $curTitle . '</a>
                <span class="content__list__border">0</span>
                <span class="content__list__number">/' . $pageCount . '</span>
            </li>
            ';
        }
        $html .= '
        
            <section class="before content">
                <h1>Содержание</h1>
                <div class="list content__list">
                    <ul>
                        ' . $elementHtml . '
                    </ul>
                </div>
                ' . $footer . '
            </section>
        ';
        $elementPageCount = 3;
        $elements = '';
        foreach ($curReport['elements']->values as $key => $element) {
            $element = $element[0];

            $style = '';
            if ($element['img'])
                $style = 'style="background-image: url(\'http://reports.umax.agency' . str_replace(' ', '%20', $element['img']) . '\'), radial-gradient(26.44% 37.5% at 21.35% 100%, var(--main-lightColorOpacity) 0%, rgba(122, 175, 255, 0) 100%), radial-gradient(36.03% 59.54% at 79.95% -3.94%, rgba(251, 251, 251, 0.08) 0%, rgba(121, 175, 255, 0) 100%);"';
            else
                $style = '';

            $elements .= '
                <section '.$style.' name="' . $elementPageCount . '" id="' . $elementPageCount . '" class="before">
                <div class="page-number">' . $elementPageCount . '</div>
                <div class="section__content">
            ';
            $elementPageCount += 1;
            foreach ($element as $elementKey => $elementValue) {
                if ($elementKey !== 'title' && $elementKey !== 'img') {
                    foreach ($elementValue['elements'] as $elementBlock) {
                        switch ($elementBlock['type']) {
                            case 'h1':
                                $elements .= '<h1>' . $elementBlock['value'][0] . '</h1>';
                                break;

                            case 'h3':
                                $elements .= '<h3>' . $elementBlock['value'][0] . '</h3>';
                                break;

                            case 'text':
                                $elements .= '<div class="list"><div class="textArea">' . $elementBlock['value'][0] . '</div></div>';
                                break;

                            case 'img':
                                $elements .= '<div class="list image__block">';
                                $img = false;
                                $span = false;
                                if (str_contains($elementBlock['value'][0], 'storage')) {
                                    $img = $elementBlock['value'][0];
                                    $span = $elementBlock['value'][1];
                                } else {
                                    $span = $elementBlock['value'][0];
                                }
                                if ($img) {
                                    $elements .= '<img src="http://reports.umax.agency' . str_replace(' ', '%20', $elementBlock['value'][0]) . '" />';
                                }
                                if ($span) {
                                    $elements .= '<span>' . $elementBlock['value'][1] . '</span>';
                                }
                                $elements .= '</div>';
                                break;

                            case 'graph':
                                $elements .= '<div class="list canvas">';

                                $elements .= '<span>' . $elementBlock['value'][2] . '</span>';

                                $elements .= '<canvas>0</canvas>';
                                $graphArray = $elementBlock['value'];
                                unset($graphArray[0]);
                                unset($graphArray[1]);
                                unset($graphArray[2]);
                                $graph = array_chunk($graphArray, $elementBlock['value'][1]);

                                $elements .= '<legend for="canvas">';

                                foreach ($graph as $graphValue) {
                                    $elements .= '
                                        <div value="' . intval($graphValue[1]) . '" class="legend__element">
                                            <div color="' . $graphValue[2] . '" class="circle">0</div>
                                            <span>' . $graphValue[0] . '</span>
                                        </div>
                                    ';
                                }

                                $elements .= '</legend></div>';
                                break;

                            case 'listMarc':
                                $elements .= '<div class="list list-block marked"><ul>';

                                foreach ($elementBlock['value'] as $elementBlockValue) {
                                    $elements .= '<li>' . $elementBlockValue . '</li>';
                                }

                                $elements .= '</ul></div>';
                                break;

                            case 'listNumeric':
                                $elements .= '<div class="list list-block nummeric"><ul>';

                                foreach ($elementBlock['value'] as $elementBlockValue) {
                                    $elements .= '<li>' . $elementBlockValue . '</li>';
                                }

                                $elements .= '</ul></div>';
                                break;

                            case 'listIcon':
                                $elements .= '<div class="list list-block img"><ul>';

                                foreach ($elementBlock['value'] as $elementBlockValue) {
                                    $elements .= '<li>' . $elementBlockValue . '</li>';
                                }

                                $elements .= '</ul></div>';
                                break;

                            case 'btn':
                                $btnStyle = '';
                                if ($elementBlock['value'][2]) {
                                    $btnStyle .= 'background-color: ' . $elementBlock['value'][2] . ';';
                                }
                                if ($elementBlock['value'][3]) {
                                    $btnStyle .= 'color: ' . $elementBlock['value'][3] . ';';
                                }
                                if ($elementBlock['value'][4]) {
                                    $btnStyle .= 'border-color: ' . $elementBlock['value'][4] . ';';
                                }

                                $elements .= '
                                    <a href="' . $elementBlock['value'][1] . '" target="blank" class="button" style="' . $btnStyle . '">
                                        ' . $elementBlock['value'][0] . '
                                    </a>
                                ';
                                break;

                            case 'tableGraph':
                                $elements .= '
                                <div class="table-graph table-graph__table">
                                    <table>
                                        <tbody>
                                            <tr class="trHead">
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/visitors.svg" />
                                                    Посетители
                                                </td>
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/new_visitors.svg" />
                                                    Новые посетители
                                                </td>
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/deep.svg" />
                                                    Глубина
                                                </td>
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/views.svg" />
                                                    Просмотры
                                                </td>
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/cancels.svg" />
                                                    Отказы
                                                </td>
                                                <td class="table__element tdHead">
                                                    <img src="http://reports.umax.agency/img/time.svg" />
                                                    Время на сайте
                                                </td>
                                                </tr>
                                                <tr>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][0] . '
                                                </td>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][1] . '
                                                </td>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][2] . '
                                                </td>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][3] . '
                                                </td>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][4] . '
                                                </td>
                                                <td class="tdMain">
                                                    ' . $elementBlock['value'][5] . '
                                                </td>
                                                </tr>
                                                <tr>
                                                <td class="table__element tdFooter">
                                                    Количество уникальных посетителей
                                                </td>
                                                <td class="table__element tdFooter">
                                                    Процент уникальных посетителей, посетивших сайт в отчетном периоде, активность которых включала их самый
                                                    первый за всю историю накопления данных визит на сайт
                                                </td>
                                                <td class="table__element tdFooter">
                                                    Количество страниц, просмотренных посетителем во время визита
                                                </td>
                                                <td class="table__element tdFooter">
                                                    Число просмотров страниц на сайте за отчетный период
                                                </td>
                                                <td class="table__element tdFooter">
                                                    Доля визитов, когда состоялся лишь один просмотр страницы, продолжавшийся менее 15 секунд
                                                </td>
                                                <td class="table__element tdFooter">
                                                    Средняя продолжительность визита в минутах и секундах
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="' . $elementBlock['value'][6] . '" target="blank" class="table-graph__link">
                                    Сравнение трафика <br />
                                    с предыдущим месяцем
                                </a>
                                ';
                                break;

                            case 'table':
                                $elements .= '
                                <div class="table">
                                  <table>';

                                $tableAr = $elementBlock['value'];
                                unset($tableAr[0]);
                                unset($tableAr[1]);
                                $table = array_chunk($tableAr, $elementBlock['value'][1]);

                                if ($elementBlock['value'][0] > 1) {
                                    $elements .= '
                                    <thead>
                                        <tr>';

                                    foreach ($table[0] as $tableHead) {
                                        $elements .= '<td style="width: calc(100% / ' . $elementBlock['value'][1] . ')">' . $tableHead . '</td>';
                                    }

                                    $elements .= '
                                        </tr>
                                    </thead>
                                    ';
                                } else {
                                    array_unshift($table, null);
                                }

                                $elements .= '
                                    <tbody>';

                                foreach ($table as $tableKey => $tableValue) {
                                    if ($tableKey !== 0) {
                                        $elements .= '
                                            <tr>
                                        ';

                                        foreach ($tableValue as $tableElementValue) {
                                            $elements .= '<td style="width: calc(100% / ' . $elementBlock['value'][1] . ')">' . $tableElementValue . '</td>';
                                        }

                                        $elements .= '
                                            </tr>
                                        ';
                                    }
                                }
                                $elements .= '
                                        </tbody>
                                    </table>
                                </div>';
                                break;

                            default:
                                break;
                        }
                    }
                }
            }
            $elements .= $footer . '
                    </div>
                </section>
            ';
        }

        $html .= $elements;
        $html .= '
            <section class="contacts">
                <h1>контакты</h1>
                <div class="quote">
                    <div class="textArea">
                        <svg class="quote__left" width="84" height="61" viewBox="0 0 84 61" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.602 60.72C32.178 60.72 39.108 56.058 42.258 48.372C45.66 56.058 53.094 60.72 61.914 60.72C74.766 60.72 83.082 51.9 83.082 39.804C83.082 28.968 75.396 20.148 64.434 20.148C59.016 20.148 53.724 21.912 52.338 23.676C52.338 21.282 53.976 18.258 57.126 14.604C63.3 7.422 76.404 3.76799 82.83 3.76799L80.31 0.239994C60.906 0.239994 44.274 11.706 40.494 28.464C36.966 22.92 31.8 20.148 25.122 20.148C19.704 20.148 14.412 21.912 13.026 23.676C13.026 21.282 14.664 18.258 17.814 14.604C23.988 7.422 37.092 3.76799 43.518 3.76799L40.998 0.239994C33.942 0.239994 27.012 1.878 20.586 5.02799C7.608 11.454 0.426 22.542 0.426 35.52C0.426 51.774 10.002 60.72 22.602 60.72Z"
                            fill-opacity="0.17" />
                        </svg>
                        ' . $curReport['report']->quote . '
                        <svg class="quote__right" width="84" height="61" viewBox="0 0 84 61" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M61.398 0.279998C51.822 0.279997 44.892 4.942 41.742 12.628C38.34 4.942 30.906 0.279995 22.086 0.279994C9.234 0.279993 0.918004 9.1 0.918002 21.196C0.918002 32.032 8.604 40.852 19.566 40.852C24.984 40.852 30.276 39.088 31.662 37.324C31.662 39.718 30.024 42.742 26.874 46.396C20.7 53.578 7.596 57.232 1.17 57.232L3.68999 60.76C23.094 60.76 39.726 49.294 43.506 32.536C47.034 38.08 52.2 40.852 58.878 40.852C64.296 40.852 69.588 39.088 70.974 37.324C70.974 39.718 69.336 42.742 66.186 46.396C60.012 53.578 46.908 57.232 40.482 57.232L43.002 60.76C50.058 60.76 56.988 59.122 63.414 55.972C76.392 49.546 83.574 38.458 83.574 25.48C83.574 9.226 73.998 0.279999 61.398 0.279998Z"
                            fill-opacity="0.17" />
                        </svg>
                    </div>
                </div>
                <div class="user-block">
                    <div class="user">
                        <div class="user__image" style="width:206px;height:206px;">
                            <img src="http://reports.umax.agency' . str_replace(' ', '%20', $curReport['report']->photo) . '" style="widht:206px;height:206px;" />
                        </div>
                        <div class="user__info">
                            <div class="user__info__name">' . $curReport['report']->name . '</div>
                            <div>' . $curReport['user']->post . '</div>
                            <div><a href="tel:' . $curReport['report']->phone . '">' . $curReport['report']->phone . '</a></div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer__contacts">0</div>
                    <div>
                        <svg width="249" height="86" viewBox="0 0 249 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M132.783 48.6879C128.516 48.6879 125.253 47.5029 122.994 45.37C120.735 43.237 119.48 39.9191 119.48 35.6531V19.0634H126.257V35.6531C126.257 38.0231 126.759 39.6821 128.014 41.104C129.269 42.289 130.775 43 132.783 43C134.791 43 136.548 42.289 137.552 41.104C138.807 39.919 139.309 38.2601 139.309 35.8901V19.0634H146.087V35.6531C146.087 39.9191 144.832 43.237 142.573 45.37C140.062 47.7399 136.799 48.6879 132.783 48.6879ZM152.864 48.4509V19.3004H160.143L168.175 31.6242L176.208 19.3004H183.487V48.4509H176.71V29.4912L168.175 42.052H167.924L159.39 29.7282V48.6879H152.864V48.4509ZM219.13 48.4509L229.923 33.5202L219.632 19.3004H227.413L233.94 28.7802L240.466 19.3004H247.996L237.705 33.5202L248.247 48.4509H240.466L233.689 38.4971L226.66 48.4509H219.13ZM185.746 48.4509L198.798 19.0634H205.074L218.126 48.4509H211.098L208.839 43.237H194.782L192.523 48.4509H185.746ZM197.292 37.5491H206.329L201.811 26.8843L197.292 37.5491ZM119.229 57.6937H122.743C126.006 57.6937 128.265 59.8267 128.265 62.6707C128.265 65.5146 126.006 67.6476 122.743 67.6476H119.229V57.6937ZM122.743 66.4626C125.253 66.4626 127.01 64.8036 127.01 62.6707C127.01 60.5377 125.253 58.8787 122.743 58.8787H120.233V66.4626H122.743ZM131.026 57.6937H132.281V67.4106H131.026V57.6937ZM134.791 62.6707C134.791 60.0637 136.799 57.6937 140.062 57.6937C141.82 57.6937 142.824 58.1677 143.828 59.1157L143.075 59.8267C142.322 59.1157 141.318 58.6417 139.812 58.6417C137.552 58.6417 135.795 60.5377 135.795 62.6707C135.795 65.0406 137.301 66.6996 139.812 66.6996C141.067 66.6996 142.071 66.2256 142.824 65.7516V63.3816H139.56V62.4337H143.828V66.4626C142.824 67.1736 141.318 67.8846 139.56 67.8846C136.799 67.6476 134.791 65.5146 134.791 62.6707ZM146.84 57.6937H148.095V67.4106H146.84V57.6937ZM153.868 58.8787H150.354V57.9307H158.637V58.8787H155.123V67.6476H153.868V58.8787ZM163.406 57.6937H164.41L169.179 67.6476H167.924L166.669 65.0406H160.896L159.641 67.6476H158.386L163.406 57.6937ZM166.167 64.0926L163.908 59.1157L161.398 64.0926H166.167ZM171.188 57.6937H172.443V66.4626H178.216V67.4106H171.188V57.6937ZM188.758 57.6937H189.762L194.531 67.6476H193.276L192.021 65.0406H186.248L184.993 67.6476H183.738L188.758 57.6937ZM191.519 64.0926L189.26 59.1157L187.001 64.0926H191.519ZM195.535 62.6707C195.535 60.0637 197.543 57.6937 200.806 57.6937C202.564 57.6937 203.568 58.1677 204.572 59.1157L203.819 60.0637C203.066 59.3527 202.062 58.8787 200.555 58.8787C198.296 58.8787 196.539 60.7747 196.539 62.9077C196.539 65.2776 198.045 66.9366 200.555 66.9366C201.811 66.9366 202.815 66.4626 203.568 65.9886V63.6186H200.806V62.6707H205.074V66.6996C204.07 67.4106 202.564 68.1216 200.806 68.1216C197.543 67.6476 195.535 65.5146 195.535 62.6707ZM207.584 57.6937H215.114V58.6417H208.839V61.9597H214.612V62.9077H208.839V66.4626H215.365V67.4106H207.835V57.6937H207.584ZM217.624 57.6937H218.628L225.154 65.5146V57.6937H226.409V67.6476H225.405L218.628 59.5897V67.6476H217.373V57.6937H217.624ZM228.919 62.6707C228.919 59.8267 231.178 57.6937 234.191 57.6937C236.199 57.6937 237.203 58.4047 238.207 59.3527L237.454 60.0637C236.701 59.3527 235.697 58.6417 234.191 58.6417C231.931 58.6417 230.174 60.3007 230.174 62.6707C230.174 65.0406 231.931 66.6996 234.191 66.6996C235.697 66.6996 236.45 66.2256 237.454 65.2776L238.207 65.9886C237.203 66.9366 235.948 67.6476 233.94 67.6476C231.178 67.6476 228.919 65.5146 228.919 62.6707ZM243.478 63.6186L239.211 57.6937H240.717L244.231 62.6707L247.745 57.6937H249L244.733 63.6186V67.4106H243.478V63.6186ZM37.9022 42.763C35.8942 42.763 33.8861 42.289 32.6311 41.104C31.376 39.919 30.874 38.2601 30.874 36.1271V27.5953H34.3881V35.8901C34.3881 37.0751 34.6391 38.0231 35.1411 38.4971C35.6431 39.2081 36.8982 39.4451 37.9022 39.4451C38.9063 39.4451 39.9103 39.2081 40.6633 38.4971C41.1653 37.7861 41.4163 37.0751 41.4163 35.8901V27.3583H44.9304V35.6531C44.9304 37.7861 44.4284 39.4451 43.1734 40.63C41.9184 42.052 40.1613 42.763 37.9022 42.763ZM52.9627 42.526V27.8323H56.7278L60.744 33.2832L64.7601 27.8323H68.5252V42.526H65.2621V32.8092L60.995 38.2601L56.7278 32.8092V42.289H52.9627V42.526ZM30.121 63.1446L36.6472 48.2139H39.9103L46.4365 63.1446H42.9224L41.6673 60.5377H34.6391L33.6351 63.1446H30.121ZM35.8942 57.6937H40.4123L38.4042 52.2428L35.8942 57.6937ZM53.2137 63.1446L58.4849 55.5608L53.2137 48.2139H57.2298L60.493 52.9538L63.7561 48.2139H67.5212L62.25 55.3238L67.5212 62.9077H63.505L59.9909 57.9307L56.4768 62.9077H53.2137V63.1446ZM63.505 5.55465L61.497 2.94769C59.4889 0.814732 56.2258 -0.370248 53.2137 0.103744L19.5786 4.60667C16.5665 5.31765 14.0565 7.21362 13.0524 10.0576L0.502016 43C-0.502016 45.8439 0 48.9249 2.00806 51.0579L24.8498 76.1794C25.8538 77.3644 27.1089 78.0754 28.3639 78.5494C29.619 79.4974 31.125 80.2084 32.6311 80.4454L67.2702 85.8963C70.2823 86.3702 73.5454 85.1853 75.5534 83.0523L99.6502 53.1908C101.658 50.8209 102.16 47.7399 101.156 45.133L87.0998 18.3524C86.0958 15.5085 83.3347 13.6125 80.3226 13.1385L77.0595 12.9015L75.0514 9.58358C73.5454 6.97662 70.5333 5.55465 67.5212 5.55465H63.505ZM7.53024 38.9711C6.02419 41.578 6.02419 44.659 7.53024 47.2659L22.5907 71.2025L3.51411 50.1099C1.75706 48.2139 1.25504 45.8439 2.25907 43.474L14.8095 10.5316C15.5625 8.3986 17.5706 6.73963 20.0806 6.26564L53.7157 1.76272C56.2258 1.28872 58.7359 2.23671 60.2419 3.89568L61.497 5.55465L32.129 5.79165C29.1169 5.79165 26.1048 7.45062 24.5988 10.0576L7.53024 38.9711ZM15.0605 36.1271C13.0524 38.4971 12.5504 41.578 13.5544 44.185L23.8458 70.2545L8.78528 46.3179C7.53024 44.185 7.53024 41.815 8.78528 39.6821L26.1048 10.7686C27.3599 8.6356 29.619 7.45062 32.129 7.45062L62.752 7.21362L66.2661 11.9535L43.6754 10.0576C40.6633 9.58358 37.6512 10.7686 35.6431 12.9015L15.0605 36.1271ZM74.8004 12.6645L68.5252 11.9535L64.7601 7.21362H67.2702C69.7802 7.21362 72.0393 8.3986 73.2944 10.5316L74.8004 12.6645ZM92.873 47.9769C94.379 45.37 94.379 42.289 92.873 39.6821L77.8125 14.3235L79.8206 14.5605C82.3307 15.0345 84.3387 16.6935 85.0917 18.8264L85.3428 19.0634L99.3992 45.8439C100.152 47.9769 99.9012 50.5839 98.1442 52.2428L74.0474 82.1043C72.5413 84.0003 70.0312 84.7113 67.5212 84.4743L38.1532 79.9714L68.0232 79.7344C71.0353 79.7344 74.0474 78.0754 75.5534 75.4684L92.873 47.9769ZM43.6754 11.7165L67.7722 13.6125L82.3307 32.5722C84.0877 34.4681 84.3387 36.8381 83.5857 39.2081L72.7923 66.9366C72.0393 69.0695 70.0312 70.7285 67.5212 71.2025L33.1331 77.3644C31.878 77.6014 30.874 77.6014 29.619 77.1274C28.8659 76.4164 28.1129 75.4684 27.8619 74.5204L15.3115 43.711C14.8095 42.526 14.8095 41.341 15.0605 40.393C15.0605 39.2081 15.5625 38.0231 16.3155 37.0751L36.8982 14.0865C38.4042 12.1905 40.9143 11.2426 43.6754 11.7165ZM83.5857 31.6242L70.0312 13.8495L75.8044 14.3235L91.3669 40.63C92.622 42.763 92.622 45.133 91.3669 47.2659L74.0474 74.5204C72.7923 76.6534 70.5333 77.8384 68.0232 77.8384L38.1532 78.0754L67.7722 72.8615C70.7843 72.3875 73.2944 70.2545 74.2984 67.4106L85.0917 39.4451C86.0958 36.8381 85.5938 33.7572 83.5857 31.6242Z"
                            fill="#302C3B" fill-opacity="0.25" />
                        </svg>
                    </div>
                </div>
            </section>
        ';

        $html .= '
            </div>
            </div>
        ';
        return $html;
    }

    public function getPdfpreview($report, Request $request)
    {
        $elements = self::reportElements($request, true);
        return self::getPdf($report, $elements);
    }
}
