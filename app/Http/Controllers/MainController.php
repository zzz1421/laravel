<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromotionalVideo;
use App\Models\Notice;
use App\Models\Schedule;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index(Request $request)
{
    $year = $request->input('year', now()->year);
    $month = $request->input('month', now()->month);
    
    $currentDate = \Carbon\Carbon::createFromDate($year, $month, 1);
    $prevDate = $currentDate->copy()->subMonth();
    $nextDate = $currentDate->copy()->addMonth();

    $schedules = \App\Models\Schedule::where('is_display', true)
        ->where(function($q) use ($currentDate) {
            $start = $currentDate->copy()->startOfMonth();
            $end = $currentDate->copy()->endOfMonth();
            
            $q->whereBetween('start', [$start, $end])
            ->orWhereBetween('end', [$start, $end])
            ->orWhere(function($sq) use ($start, $end) {
                $sq->where('start', '<=', $start)->where('end', '>=', $end);
            });
        })
        ->get()
        ->groupBy(fn($item) => \Carbon\Carbon::parse($item->start)->day);

    // [중요] AJAX 요청일 경우 달력 섹션만 별도로 반환합니다.
    if ($request->ajax()) {
        return view('partials.calendar_body', compact('schedules', 'currentDate', 'prevDate', 'nextDate'))->render();
    }

    $video = \App\Models\PromotionalVideo::latest()->first();
    $notices = \App\Models\Notice::latest()->take(4)->get();

    return view('main', compact('video', 'notices', 'schedules', 'currentDate', 'prevDate', 'nextDate'));
}
}