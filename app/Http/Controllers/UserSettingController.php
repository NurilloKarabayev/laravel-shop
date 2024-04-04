<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserSettingResource;
use App\Models\UserSetting;
use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;

class UserSettingController extends Controller
{

    public function index()
    {
        return $this->response(UserSettingResource::collection(auth()->user()->settings));
    }

    public function store(StoreUserSettingRequest $request)
    {
//        return true;
        if (auth()->user()->settings()->where("setting_id" , $request->setting_id)->exists()){
            return $this->error("setting already exist");
        }
        $userSetting = auth()->user()->settings()->create([
           'setting_id' => $request->setting_id,
            'value_id' => $request->value_id ?? null,
            'switch' => $request->switch ?? null,

        ]);

        return $this->success("created successfully", $userSetting);
    }


    public function show(UserSetting $userSetting)
    {
        //
    }

    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {
        $userSetting->update([
            "switch" => $request->switch ?? null,
            "value_id" => $request->value_id ?? null,
        ]);

        return $this->success("updated successfully");
    }


    public function destroy(UserSetting $userSetting)
    {
        $userSetting->delete();

        return $this->success("setting deleted successfully");
    }
}
