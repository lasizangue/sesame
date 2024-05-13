<?php


namespace App\Helpers;

use App\Models\LogActivitie;


class LogActivity
{

    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = request()->fullUrl();
    	$log['method'] = request()->method();
    	$log['ip'] = request()->ip();
    	$log['agent'] = request()->header('user-agent');
    	$log['user_id'] = auth()->user()->id;
    	LogActivitie::create($log);
    }

    public static function logActivityLists()
    {
    	return LogActivitie::latest()->get();
    }

}