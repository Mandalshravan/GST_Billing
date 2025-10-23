<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SettingModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function setting(Request $request)
    {
        $data['getRecord'] = SettingModel::find(1);
        return view('admin.setting.update', $data);    
    }

    public function setting_update(Request $request)
    {
        $save = SettingModel::find(1);
        if (!$save) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $save->web_name = trim($request->web_name);

        // Logo upload
        if ($request->hasFile('logo')) {
            if (!empty($save->logo) && file_exists(public_path('upload/'.$save->logo))) {
                @unlink(public_path('upload/'.$save->logo));
            }
            $file = $request->file('logo');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/'), $filename);
            $save->logo = $filename;
        }

        // Favicon upload
        if ($request->hasFile('favicon')) {
            if (!empty($save->favicon) && file_exists(public_path('upload/'.$save->favicon))) {
                @unlink(public_path('upload/'.$save->favicon));
            }
            $file = $request->file('favicon');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/'), $filename);
            $save->favicon = $filename;
        }

        // Remove logo if requested
        if ($request->has('remove_logo') && $request->remove_logo == 1) {
            if (!empty($save->logo) && file_exists(public_path('upload/'.$save->logo))) {
                @unlink(public_path('upload/'.$save->logo));
            }
            $save->logo = null;
        }

        // Remove favicon if requested
        if ($request->has('remove_favicon') && $request->remove_favicon == 1) {
            if (!empty($save->favicon) && file_exists(public_path('upload/'.$save->favicon))) {
                @unlink(public_path('upload/'.$save->favicon));
            }
            $save->favicon = null;
        }

        $save->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}

