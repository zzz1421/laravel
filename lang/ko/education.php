<?php

return [
    'page_title' => '교육 신청',
    'title' => '교육 과정 안내',
    
    // 카드 내부 텍스트
    'status' => [
        'recruiting' => '모집중',
        'waiting' => '대기',
        'closed' => '마감',
    ],
    'label' => [
        'period' => '교육 기간',
        'place' => '교육 장소',
        'tba' => '추후 공지', // To Be Announced
    ],
    'button' => [
        'details' => '상세보기 & 신청',
    ],
    'empty' => '현재 등록된 교육 과정이 없습니다.',

    // ▼▼▼ [상세 페이지용 추가] ▼▼▼
    'show' => [
        'details_title' => '교육 상세 내용',
        'info_title' => '교육 정보',
        'apply_title' => '교육 신청하기',
    ],
    'label' => [
        // 기존 label에 이어서 추가
        'period' => '교육 기간',
        'place' => '장소',
        'tba' => '추후 공지',
        'register_period' => '접수 기간', // 추가
        'capacity' => '정원',           // 추가
        'price' => '교육비',            // 추가
        'person' => '명',               // 추가 (인원 단위)
    ],
    'unit' => [
        'won' => '원', // 화폐 단위
    ],
    'form' => [
        'name' => '신청자 성명',
        'phone' => '연락처',
        'email' => '이메일',
        'company' => '소속(회사명)',
        'position' => '직책',
        'memo' => '남기실 말씀',
        'agree' => '개인정보 수집 및 이용에 동의합니다.',
    ],
    'message' => [
        'not_period' => '현재 신청 기간이 아닙니다.',
        'login_required' => '교육 신청은 로그인 후 가능합니다.',
    ],
    'button' => [
        // 기존 button에 이어서 추가
        'details' => '상세보기 & 신청',
        'submit' => '신청 완료하기',
        'login' => '로그인 하러 가기',
        'back' => '목록으로 돌아가기',
    ],
];