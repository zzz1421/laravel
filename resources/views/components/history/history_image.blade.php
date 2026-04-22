{{-- resources/views/components/history-image.blade.php --}}

@props([
    'src' => '', // 이미지 경로
    'alt' => '연혁 사진', // 이미지 설명
])

{{-- 너비 600px, 높이 800px, 테두리 반경 25px, 테두리 1px, 배경색 적용 --}}
<div {{ $attributes->merge([
    'class' => 'w-[60rem] h-[80rem] rounded-[2.5rem] border border-black bg-[#F5F4EC] overflow-hidden flex items-center justify-center'
]) }}>
    {{-- 이미지가 제공된 경우 표시 --}}
    @if ($src)
        <img 
            src="{{ asset($src) }}" 
            alt="{{ $alt }}"
            class="w-full h-full object-cover" 
        />
    {{-- 이미지가 제공되지 않은 경우, 스타일만 보여주는 영역 --}}
    @else
        <div class="text-[3rem] text-gray-400">
            사진이 없습니다
        </div>
    @endif
</div>