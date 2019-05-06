<?php
namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\BaseRequests;

class UpdateRequest extends BaseRequests
{
    public function rules() {
        return [
            'email'     => 'required|email|min:4|max:100|unique:users,email,' . $this->id,
            'name'      => 'required',
            'password'  => 'required',
        ];
    }
}
