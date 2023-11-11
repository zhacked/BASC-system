<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index(){
        $Activity = Activity::query()
        ->when(request('query'), function ($query, $searchQuery) {
            $query->where('log_name', 'like', "%{$searchQuery}%");
        })
        ->latest()
        ->paginate(setting('pagination_limit'));

    return $Activity;
    }
}
