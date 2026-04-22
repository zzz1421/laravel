<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * 일정 목록 (리스트)
     */
    public function index()
    {
        // 시작일 기준 내림차순 정렬 (최신순)
        $schedules = Schedule::orderBy('start', 'desc')->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * 등록 폼
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * 저장 처리
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end'   => 'nullable|date|after_or_equal:start', // 종료일은 시작일보다 같거나 커야 함
            'color' => 'required',
        ]);

        $data = $request->all();
        // 체크박스 미체크 시 0 처리
        $data['is_display'] = $request->has('is_display') ? 1 : 0;

        Schedule::create($data);

        return redirect()->route('admin.schedules.index')->with('success', '일정이 등록되었습니다.');
    }

    /**
     * 수정 폼
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * 수정 처리
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end'   => 'nullable|date|after_or_equal:start',
            'color' => 'required',
        ]);

        $data = $request->all();
        $data['is_display'] = $request->has('is_display') ? 1 : 0;

        $schedule->update($data);

        return redirect()->route('admin.schedules.index')->with('success', '일정이 수정되었습니다.');
    }

    /**
     * 삭제 처리
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', '일정이 삭제되었습니다.');
    }
}