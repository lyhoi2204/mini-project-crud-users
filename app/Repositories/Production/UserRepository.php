<?php
namespace App\Repositories\Production;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function buildQueryByFilter($query, $filter)
    {
        if(isset($filter['query'])) {
            $keywork = $filter['query'];
            if(!empty($keywork)) {
                $query = $query->where('email', 'LIKE', "%{$keywork}%")
                                ->orWhere('name', 'LIKE', "%{$keywork}%");
            }
            unset($filter['query']);
        }
        return parent::buildQueryByFilter($query, $filter);
    }
}
