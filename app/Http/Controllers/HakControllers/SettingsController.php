<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Models\HakModels\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    private $headName = 'Settings';
    private $routeName = 'settings';
    private $permissionName = 'settings';
    private $snakeName = 'settings';

    private $camelCase = 'settings';
    private $model = 'Settings';


    public function index()
    {
        return view('backend.hak_views.settings.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,
            ]
        );
    }
    public function generalSettings()
    {
        $settings = Settings::all();
        return view('backend.hak_views.settings.settings')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'settings' => $settings,
            ]
        );
    }
    public function generalSettingsUpdate(Request $request)
    {
        $rules = array_fill_keys(array_keys($request->all()), 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(['errors' => $validator->errors()], 422);
        }


        foreach ($request->keys() as $key) {
            if ($key === '_token' || $key === '_method') {
                continue; // Skip this iteration if the key is _token or _method
            }
            // dd($request->all());
            $record = Settings::where('name', $key)->first();
            if ($record) {
                $record->value = $request->$key;
                $record->update();
            }
        }

        return redirect()->back()->with('message_store', value: 'Settings updated successfully!');
    }

    public function modelSettings($modelSettings)
    {
        // $settings = Settings::all();
        $settings = Settings::where('model', decrypt($modelSettings))->get();
        return view('backend.hak_views.settings.model_settings')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'modelSettings' => decrypt(value: $modelSettings),
                'settings' => $settings,
            ]
        );
    }
    public function modelSettingsUpdate(Request $request)
    {
        $rules = array_fill_keys(array_keys($request->all()), 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(['errors' => $validator->errors()], 422);
        }


        foreach ($request->keys() as $key) {
            if ($key === '_token' || $key === '_method') {
                continue; // Skip this iteration if the key is _token or _method
            }
            $record = Settings::where('name', $key)->first();
            if ($record) {
                $record->value = $request->$key;
                $record->update();
            }
        }

        return redirect()->back()->with('message_store', value: 'Settings updated successfully!');
    }
}