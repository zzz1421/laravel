@extends('layouts.foex')

@section('title', __('menu.intro')) 

@section('content')
<style>
    html { 
        scroll-snap-type: y mandatory !important; 
        scroll-behavior: smooth; 
        /* 🚨 전역 패딩 제거: 개별 섹션에서 마진으로 조절합니다 */
        scroll-padding-top: 0 !important; 
    }

    /* 일반 섹션들은 헤더 아래에 딱 붙어야 하므로 80px 마진을 줍니다 */
    section, footer { 
        scroll-snap-align: start !important; 
        scroll-snap-stop: always !important; 
    }

    /* 🚨 히어로 섹션은 특수하므로 마진과 높이를 별도 제어 */
    #hero { 
        height: 200vh !important; 
        scroll-margin-top: 0 !important; 
        scroll-snap-align: none !important;
    }

    header.header-force-light {
        background-color: transparent !important;
        box-shadow: none !important; /* 그림자도 제거해서 사진이 깔끔하게 보이게 함 */
    }

    /* 🚨 2. [사라졌던 코드 복구] 초기 로딩 및 검은색 모드일 때 글자색 강제 (버그 해결 핵심) 🚨 */
    header:not(.bg-white) a:not(ul a),
    header:not(.bg-white) span:not(ul span),
    header:not(.bg-white) svg:not(ul svg),
    header.header-force-dark a:not(ul a),
    header.header-force-dark span:not(ul span),
    header.header-force-dark svg:not(ul svg) {
        color: #303031 !important;
        fill: #303031 !important;
    }

    /* 3. 라이트 모드일 때도 메인 메뉴만 흰색으로 변경하고 서브메뉴는 무시 */
    header.header-force-light a:not(ul a),
    header.header-force-light span:not(ul span),
    header.header-force-light svg:not(ul svg) {
        color: #ffffff !important;
        fill: #ffffff !important;
    }

    /* 부드러운 전환 효과 */
    header {
        transition: background-color 0.5s ease, color 0.5s ease !important;
    }
</style>

<div class="bg-white" 
     x-data="introHandler()" 
     @scroll.window="updateProgress">
    @include('components.intro.sections.hero')
    @include('components.intro.sections.competence')
    @include('components.intro.sections.overview')
    @include('components.intro.sections.capabilities')
    @include('components.intro.sections.history')
</div>

<script>
    function introHandler() {
        return {
            progress: 0,
            // 🚨 headerEl을 처음엔 비워두고 init에서 찾습니다.
            headerEl: null, 

            // 🚨 Alpine.js가 컴포넌트 로드 시 자동으로 실행하는 함수입니다.
            init() { 
                this.headerEl = document.querySelector('header');
                // 초기 로딩 시점에도 위치 계산을 한 번 때려줍니다.
                this.updateProgress(); 
            },

            updateProgress() {
                const hero = document.getElementById('hero');
                if (!hero) return;
                
                let rect = hero.getBoundingClientRect();
                let windowHeight = window.innerHeight;
                
                // 🚨 이제 사진이 꽉 차는 지점은 정확히 100vh 스크롤 시점입니다.
                this.progress = Math.max(0, Math.min(1, -rect.top / windowHeight));

                if (this.headerEl) {
                    // 사진이 완전히 찼을 때(자석 포인트 2에 붙었을 때) 색상 반전
                    if (this.progress > 0.98 && rect.bottom > 200) {
                        this.headerEl.classList.add('header-force-light');
                        this.headerEl.classList.remove('header-force-dark');
                    } else {
                        this.headerEl.classList.add('header-force-dark');
                        this.headerEl.classList.remove('header-force-light');
                    }
                }
            }
        }
    }
</script>