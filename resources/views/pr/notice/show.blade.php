<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $notice->bd_subject }} - 공지사항</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 본문 내용 스타일 (에디터로 작성된 HTML이 잘 보이게) */
        .content-body p { margin-bottom: 1em; line-height: 1.6; }
        .content-body img { max-width: 100%; height: auto; }
    </style>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
        
        <div class="border-b pb-4 mb-6">
            <span class="text-blue-500 font-bold text-sm">{{ $notice->bd_category ?? '공지' }}</span>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">{{ $notice->bd_subject }}</h1>
            <div class="text-gray-500 text-sm mt-2 flex justify-between">
                <div>
                    작성자: {{ $notice->bd_writer_name ?? '관리자' }} | 
                    날짜: {{ substr($notice->bd_reg_date, 0, 10) }}
                </div>
                <div>조회수: {{ $notice->bd_hit }}</div>
            </div>
        </div>

        <div class="content-body min-h-[300px] text-gray-700">
            {!! $notice->bd_content !!}
        </div>

        <div class="mt-10 border-t pt-6 flex justify-center">
            <a href="{{ url('/notice') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded transition">
                목록으로
            </a>
        </div>

    </div>

</body>
</html>