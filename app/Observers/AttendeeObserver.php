<?php

namespace App\Observers;


use Illuminate\Support\Facades\Notification;
use App\Notifications\AttendeeCreated;
use App\Notifications\AttendeeUpdated;
use App\Notifications\AttendeeDeleted;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Asset\Report;
use App\Models\Asset\Meeting;
use App\Models\Asset\Department;
use App\Models\Asset\Attendee;
use App\Models\Access\User\User;
use App\Models\Asset\Structure;
use App\Models\Asset\Construction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AttendeeObserver
{
    public function created(Attendee $model){
        $users = $model->department->users;
        Notification::send($users, new AttendeeCreated($model));
    }

    public function updated(Attendee $model){

    }

    public function deleted(Attendee $model){
        $users = $model->department->users;
        Notification::send($users, new AttendeeDeleted($model));
    }
}
