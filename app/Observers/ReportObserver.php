<?php

namespace App\Observers;


use App\Models\Asset\Report;

class ReportObserver
{
    public function created(Report $model)
    {
//        $user = JWTAuth::parseToken()->authenticate();
//        Notification::send($user, new NotiCreated($model));
    }

    public function updated(Report $model)
    {
//        $user = JWTAuth::parseToken()->authenticate();
//        Notification::send($user, new NotiCreated($model));
        //Notification::send(User::query()->find($original['assignee']), new TaskDeleted($model));
    }

    public function deleted(Report $model)
    {
//        $user = JWTAuth::parseToken()->authenticate();
//        Notification::send($user, new NotiDeleted($model));
    }
}
