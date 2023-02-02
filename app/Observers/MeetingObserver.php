<?php

namespace App\Observers;


use App\Models\Asset\Meeting;
use Mockery\CountValidator\Exception;
use App\Models\Access\User\User;
use App\Notifications\MeetingCreated;
use App\Notifications\MeetingDeleted;
use Illuminate\Support\Facades\Notification;

class MeetingObserver
{
    public function created(Meeting $model)
    {

            $users=User::query()->whereHas('roles', function ($q) {
                $q->where('role_id', 5);
            })->get();
            Notification::send($users, new MeetingCreated($model));
            // dd(count($users));
    }


    public function updated(Meeting $model)
    {

    }

    public function deleted(Meeting $model)
    {
        $users=User::query()->whereHas('roles', function ($q) {
            $q->where('role_id', 5);
        })->get();
        Notification::send($users, new MeetingDeleted($model));
    }
}
