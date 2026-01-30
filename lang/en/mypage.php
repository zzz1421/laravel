<?php

return [
    'title' => 'My Page',
    'subtitle' => 'Check your account information and verification status.',
    
    // Authentication & Verification
    'verification' => [
        'sent_title' => 'Verification Email Sent!',
        'sent_desc' => 'Please check your inbox and click the verification link. (Check spam folder too)',
        'security_status' => 'Account Security',
        'label' => 'Email Verification',
        'complete' => 'Your account is verified and secure.',
        'required' => 'Email verification is required to access services.',
        'badge_complete' => 'Verified',
        'button_send' => 'Resend Verification Email',
    ],

    // User Role
    'role' => [
        'admin' => 'Administrator',
        'user' => 'Member',
    ],

    // Profile Information
    'profile' => [
        'title' => 'Basic Information',
        'name' => 'Name',
        'phone' => 'Phone',
        'no_phone' => 'Not registered',
        'joined_at' => 'Joined Date',
        'last_login' => 'Last Login',
    ],

    // Education Application History
    'education' => [
        'title' => 'My Education Applications',
        'total' => 'Total :count items',
        'table' => [
            'course_name' => 'Course Name',
            'period' => 'Period',
            'applied_at' => 'Applied Date',
            'status' => 'Status',
        ],
        'status' => [
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'pending' => 'Pending',
            'deleted' => '(Deleted Course)',
        ],
        'empty' => 'No application history found.',
    ],

    // Buttons
    'logout' => 'Log Out',
];