<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $page_name = "Paramètres du système";
        $sys_setting = Setting::find(1);
        $facebook_setting = Setting::find(5);
        $instagram_setting = Setting::find(6);
        $pinterest_setting = Setting::find(7);
        $youtube_setting = Setting::find(8);
        return view('admin.pages.settings.update', [
            'page_name' => $page_name,
            'system_name' => $sys_setting->value,
            'facebook' => $facebook_setting->value,
            'instagram' => $instagram_setting->value,
            'pinterest' => $pinterest_setting->value,
            'youtube' => $youtube_setting->value,
        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'favicon' => 'image|max:1999',
            'front_logo' => 'image|max:1999',
            'admin_logo' => 'image|max:1999',
            'instagram' => 'required|min:10|url',
            'facebook' => 'required|min:10|url',
            'pinterest' => 'required|min:10|url',
            'youtube' => 'required|min:10|url',
        ], [
            'name.required' => 'Tu dois mettre le nom du site.',
            'name.min' => 'Le nom du site doit avoir au moins 3 charactères.',
            'favicon.image' => 'Les formats supportés sont: jpeg, jpg, gif, png',
            'favicon.max' => "La taille ne l'image ne doit pas depasser 2MB.",
            'front_logo.image' => 'Les formats supportés sont: jpeg, jpg, gif, png',
            'front_logo.max' => "La taille ne l'image ne doit pas depasser 2MB.",
            'admin.image' => 'Les formats supportés sont: jpeg, jpg, gif, png',
            'admin.max' => "La taille ne l'image ne doit pas depasser 2MB.",
            'instagram.required' => 'Tu dois mettre le lien pointant vers le site Instagram.',
            'instagram.min' => 'Le lien pointant vers le site Instagram doit avoir au moins 10 charactères.',
            'instagram.url' => 'Lien incorrect.',
            'facebook.required' => 'Tu dois mettre le lien pointant vers le site Facebook.',
            'facebook.min' => 'Le lien pointant vers le site Facebook doit avoir au moins 10 charactères.',
            'facebook.url' => 'Lien incorrect.',
            'pinterest.required' => 'Tu dois mettre le lien pointant vers le site Pinterest.',
            'pinterest.min' => 'Le lien pointant vers le site Pinterest doit avoir au moins 10 charactères.',
            'pinterest.url' => 'Lien incorrect.',
            'youtube.required' => 'Tu dois mettre le lien pointant vers le site Youtube.',
            'youtube.min' => 'Le lien pointant vers le site Youtube doit avoir au moins 10 charactères.',
            'youtube.url' => 'Lien incorrect.',

        ]);


        // Update system_name
        $system_name = Setting::find(1);
        $system_name->value = $request->name;
        $system_name->save();

        // update favicon
        if ($request->file('favicon')) {
            $fav_settings = Setting::find(2);
            @unlink(public_path('/others' . $fav_settings->value));
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $favicon = 'favicon.' . $extension;
            //move 
            $file->move(public_path('/others'), $favicon);
            $fav_settings->value = $favicon;
            $fav_settings->save();
        }

        // update front_logo
        if ($request->file('front_logo')) {
            $front_settings = Setting::find(3);
            @unlink(public_path('/others' . $front_settings->value));
            $file = $request->file('front_logo');
            $extension = $file->getClientOriginalExtension();
            $front_logo = 'front_logo.' . $extension;
            //move 
            $file->move(public_path('/others'), $front_logo);
            $front_settings->value = $front_logo;
            $front_settings->save();
        }

        // update admin_logo
        if ($request->file('admin_logo')) {
            $admin_settings = Setting::find(4);
            @unlink(public_path('/others' . $admin_settings->value));
            $file = $request->file('admin_logo');
            $extension = $file->getClientOriginalExtension();
            $admin_logo = 'admin_logo.' . $extension;
            //move 
            $file->move(public_path('/others'), $admin_logo);
            $admin_settings->value = $admin_logo;
            $admin_settings->save();
        }

        // update facebook link
        $facebook = Setting::find(5);
        $facebook->value = $request->facebook;
        $facebook->save();

        // update instagram link
        $instagram = Setting::find(6);
        $instagram->value = $request->instagram;
        $instagram->save();

        // update pinterest link 
        $pinterest = Setting::find(7);
        $pinterest->value = $request->pinterest;
        $pinterest->save();

        // update youtube link
        $youtube = Setting::find(8);
        $youtube->value = $request->youtube;
        $youtube->save();

        return redirect()->action('Admin\SettingsController@index')->with('toast_success', 'Mise à jour du système réussie.');
    }
}
