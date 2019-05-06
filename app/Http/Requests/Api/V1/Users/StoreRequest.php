<?php
namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\BaseRequests;

class StoreRequest extends BaseRequests
{
    public function rules() {
        return [
            'email'     => 'required|unique:users|email|min:4|max:100',
            'name'      => 'required',
            'password'  => 'required',
        ];
    }
}
