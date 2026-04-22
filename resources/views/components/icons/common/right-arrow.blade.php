{{-- [아이콘] 7x11 오른쪽 화살표 --}}
@props(['class' => ''])

<svg {{ $attributes->merge(['class' => $class]) }} xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none">
    {{-- stroke 색상을 currentColor로 변경하여 부모의 text 컬러를 따라가게 최적화했습니다. --}}
    <path d="M1 1L5.5 5.5L1 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>