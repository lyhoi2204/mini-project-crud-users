<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\StoreRequest;
use App\Http\Requests\Api\V1\Users\UpdateRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $query = $request->get('query');
        $filters = [];
        if(!empty($query)) {
            $filters['query'] = $query;
        }

        $users = $this->userRepository->filterPagination($filters);

        return response()->success($users);
    }

    public function show($id)
    {
        $user = $this->userRepository->firstByKey($id);
        if(!$user) {
            return response()->error('Cannot find this user', 404);
        }

        return response()->success($user);
    }

    public function store(StoreRequest $request)
    {
        $inputs = $request->only([
            'email', 'name', 'password'
        ]);

        $inputs['password'] = Hash::make($inputs['password']);

        $user = $this->userRepository->create($inputs);
        if(!$user) {
            return response()->error('Cannot create user', 500);
        }

        return response()->success($user);
    }

    public function update(UpdateRequest $request, $id)
    {
        $user = $this->userRepository->firstByKey($id);
        if(!$user) {
            return response()->error('Cannot find this user', 404);
        }

        $inputs = $request->only([
            'email', 'name', 'password'
        ]);

        $inputs['password'] = Hash::make($inputs['password']);

        $user = $this->userRepository->update($user, $inputs);
        if(!$user) {
            return response()->error('Cannot update user', 500);
        }

        return response()->success($user);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->firstByKey($id);
        if(!$user) {
            return response()->error('Cannot find this user', 404);
        }

        $destroyStatus = $this->userRepository->destroy($user);
        if(!$destroyStatus) {
            return response()->error('Cannot delete', 500);
        }

        return response()->success([
            'message' => 'Delete successfully'
        ]);
    }
}
