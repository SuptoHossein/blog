<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($request->all());

        // dd('hi');

        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required'
        ]);

        $setting = Setting::first();
        $setting->update($request->all());

        // image upload
        if ($request->has('site_logo')) {
            $image = $request->site_logo;
            $imageNewName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/sitelogo/', $imageNewName);
            $setting->site_logo = $imageNewName;
            $setting->save();
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }

}
