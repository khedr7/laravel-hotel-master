<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadImage;

    public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('settings.index', $setting);
    }

    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'hotel_logo');
            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }

            if ($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'hotel_logo')->update(['value' => $logo_name]);
                $this->uploadFile($request, 'logo', 'setting');
            }

            return redirect()->route('admin.settings.index')->withStatus(__('Setting is successfully added.'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
