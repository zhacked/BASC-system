<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory,LogsActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->useLogName(Auth::user()->name)
        ->setDescriptionForEvent(fn(string $eventName) => "This Setting has been {$eventName}");
    }

}
