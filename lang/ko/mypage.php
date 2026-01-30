<?php

// lang/ko/mypage.php (또는 resources/lang/ko/mypage.php)

return [
    'title' => '마이페이지',
    'subtitle' => '내 계정 정보와 인증 상태를 확인하세요.',
    
    // 인증 관련 메시지
    'verification' => [
        'sent_title' => '인증 메일이 발송되었습니다!',
        'sent_desc' => '메일함을 확인하여 링크를 클릭해주세요. (스팸함도 확인해주세요)',
        'security_status' => '계정 보안 상태',
        'label' => '이메일 인증',
        'complete' => '인증이 완료된 안전한 계정입니다.',
        'required' => '서비스 이용을 위해 인증이 필요합니다.',
        'badge_complete' => '인증 완료',
        'button_send' => '인증 메일 발송',
    ],

    // 프로필/기본 정보
    'role' => [
        'admin' => '관리자',
        'user' => '일반회원',
    ],
    'profile' => [
        'title' => '기본 정보',
        'name' => '이름',
        'phone' => '연락처',
        'no_phone' => '등록된 연락처 없음',
        'joined_at' => '가입일',
        'last_login' => '최근 접속',
    ],

    // 교육 신청 내역
    'education' => [
        'title' => '나의 교육 신청 내역',
        'total' => '총 :count건', // :count는 변수로 치환됨
        'table' => [
            'course_name' => '교육 과정명',
            'period' => '교육 기간',
            'applied_at' => '신청일',
            'status' => '진행 상태',
        ],
        'status' => [
            'approved' => '승인됨',
            'rejected' => '반려됨',
            'pending' => '검토중',
            'deleted' => '(삭제된 교육과정)',
        ],
        'empty' => '아직 신청한 교육 내역이 없습니다.',
    ],

    // 버튼
    'logout' => '로그아웃',
];