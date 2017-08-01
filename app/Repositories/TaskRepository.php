<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user, $limit = 100, $dir = 'asc', $orderBy = 'created_at')
    {
        return Task::where('user_id', $user->id)
                    ->orderBy($orderBy, $dir)
                    ->limit($limit)
                    ->get();
    }
}
