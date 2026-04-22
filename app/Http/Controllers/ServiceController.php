<?php
namespace App\Http\Controllers;
class ServiceController extends Controller {
    public function eduApply() { return view('service.edu_apply'); } // 교육 신청 폼
    public function inquiry() { return view('service.inquiry'); }   // 문의 폼
}