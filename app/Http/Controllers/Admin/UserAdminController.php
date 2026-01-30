<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // ★ 중요: User 모델 임포트
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    /**
     * 회원 목록 보기
     */
    public function index(Request $request)
    {
        $query = User::orderBy('created_at', 'desc');

        // 검색 기능 (이름, 이메일)
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('email', 'like', '%' . $request->keyword . '%');
        }

        $users = $query->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    /**
     * 회원 정보 수정 페이지 (등급 변경 등)
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * 회원 정보 업데이트 처리
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'level' => 'required|integer', // 레벨 수정
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'phone' => $request->phone,
        ];

        // 비밀번호를 입력했을 때만 변경
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', '회원 정보가 수정되었습니다.');
    }

    /**
     * 회원 강제 탈퇴
     */
    public function destroy($id)
    {
        // 관리자 본인은 삭제 불가 (안전장치)
        if (auth()->id() == $id) {
            return back()->with('error', '자기 자신은 삭제할 수 없습니다.');
        }

        User::destroy($id);

        return back()->with('success', '회원이 삭제되었습니다.');
    }
}