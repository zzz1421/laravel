<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FOEX') - {{ __('company.slogan') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="//unpkg.com/xeicon@2.3.3/xeicon.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans KR', sans-serif; }
        .nav-link { @apply text-gray-700 hover:text-blue-600 font-medium transition cursor-pointer; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-white">

    <header class="fixed w-full z-50 top-0 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-blue-700 tracking-tighter">FOEX</span>
                        <span class="text-xs text-gray-500 font-normal mt-1">Total Solution</span>
                    </a>
                </div>

                <nav class="hidden md:flex items-center space-x-1 h-full">
                    
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('company.intro') }}" 
                           class="flex items-center gap-1 py-2 transition cursor-pointer {{ request()->routeIs('company.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600 font-medium' }}" 
                           @click="open = false">
                            {{ __('menu.company') }} 
                            <i class="xi-angle-down text-xs transition" :class="{'rotate-180': open, 'text-blue-700': {{ request()->routeIs('company.*') ? 'true' : 'false' }}, 'text-gray-400': {{ request()->routeIs('company.*') ? 'false' : 'true' }} }"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col" x-cloak>
                            <a href="{{ route('company.intro') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.intro') }}</a>
                            <a href="{{ route('company.greeting') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.greeting') }}</a>
                            <a href="{{ route('company.history') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.history') }}</a>
                            <a href="{{ route('company.organization') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.organization') }}</a>
                            <a href="{{ route('company.location') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.location') }}</a>
                        </div>
                    </div>

                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('business.education') }}" 
                           class="flex items-center gap-1 py-2 transition cursor-pointer {{ request()->routeIs('business.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600 font-medium' }}" 
                           @click="open = false">
                            {{ __('menu.business') }} 
                            <i class="xi-angle-down text-xs transition" :class="{'rotate-180': open, 'text-blue-700': {{ request()->routeIs('business.*') ? 'true' : 'false' }}, 'text-gray-400': {{ request()->routeIs('business.*') ? 'false' : 'true' }} }"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col" x-cloak>
                            <a href="{{ route('business.education') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.education') }}</a>
                            <a href="{{ route('business.consulting') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.consulting') }}</a>
                            <a href="{{ route('business.techservice') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.techservice') }}</a>
                            <a href="{{ route('business.engineering') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.engineering') }}</a>
                            <a href="{{ route('business.rnd') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.rnd') }}</a>
                        </div>
                    </div>

                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('products.suite') }}" 
                           class="flex items-center gap-1 py-2 transition cursor-pointer {{ request()->routeIs('products.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600 font-medium' }}" 
                           @click="open = false">
                            {{ __('menu.solution') }} 
                            <i class="xi-angle-down text-xs transition" :class="{'rotate-180': open, 'text-blue-700': {{ request()->routeIs('products.*') ? 'true' : 'false' }}, 'text-gray-400': {{ request()->routeIs('products.*') ? 'false' : 'true' }} }"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col" x-cloak>
                            <a href="{{ route('products.suite') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Suite</a>
                            <a href="{{ route('products.node') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Node</a>
                        </div>
                    </div>

                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('pr.schedule') }}" 
                           class="flex items-center gap-1 py-2 transition cursor-pointer {{ request()->routeIs('pr.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600 font-medium' }}" 
                           @click="open = false">
                            {{ __('menu.pr') }} 
                            <i class="xi-angle-down text-xs transition" :class="{'rotate-180': open, 'text-blue-700': {{ request()->routeIs('pr.*') ? 'true' : 'false' }}, 'text-gray-400': {{ request()->routeIs('pr.*') ? 'false' : 'true' }} }"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col" x-cloak>
                            <a href="{{ route('pr.schedule') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.schedule') }}</a>
                            <a href="{{ route('pr.notice.index') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.notice') }}</a>
                            <a href="{{ route('pr.brochure') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.brochure') }}</a>
                            <a href="{{ route('pr.media') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.media') }}</a>
                            <a href="{{ route('pr.press') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.press') }}</a>
                            <a href="{{ route('pr.archive') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.archive') }}</a>
                            <a href="{{ route('pr.qna') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.qna') }}</a>
                        </div>
                    </div>

                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('service.edu.apply') }}" 
                           class="flex items-center gap-1 py-2 transition cursor-pointer {{ request()->routeIs('service.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600 font-medium' }}" 
                           @click="open = false">
                            {{ __('menu.service') }} 
                            <i class="xi-angle-down text-xs transition" :class="{'rotate-180': open, 'text-blue-700': {{ request()->routeIs('service.*') ? 'true' : 'false' }}, 'text-gray-400': {{ request()->routeIs('service.*') ? 'false' : 'true' }} }"></i>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute top-full right-0 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col" x-cloak>
                            <a href="{{ route('service.edu.apply') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.edu_apply') }}</a>
                            <a href="{{ route('service.inquiry') }}" @click="open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.inquiry') }}</a>
                        </div>
                    </div>

                </nav>

                <div class="flex items-center space-x-6">
                    
                    <div class="flex items-center space-x-2 text-sm font-medium">
                        <a href="{{ route('lang.switch', 'ko') }}" class="{{ app()->getLocale() == 'ko' ? 'text-blue-700 font-bold' : 'text-gray-400 hover:text-gray-600' }}">KR</a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-blue-700 font-bold' : 'text-gray-400 hover:text-gray-600' }}">EN</a>
                    </div>

                    <div class="flex items-center gap-3">
                        @auth
                            <span class="text-sm text-gray-600"><strong>{{ Auth::user()->name }}</strong>님</span>
                            <a href="{{ route('mypage') }}" class="text-sm text-gray-500 hover:text-blue-600">{{ __('menu.mypage') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">{{ __('menu.logout') }}</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-600">{{ __('menu.login') }}</a>
                            <a href="{{ route('register') }}" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-md">{{ __('menu.join') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow mt-20">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-400 py-10 mt-20 font-light">
        
        <div class="border-b border-gray-800 pb-8 mb-8">
            <div class="max-w-7xl mx-auto px-4 flex flex-wrap gap-8 text-sm">
                <a href="{{ route('privacy') }}" class="text-white font-bold hover:text-blue-400 transition">{{ __('menu.privacy') }}</a>
                <a href="{{ route('company.location') }}" class="hover:text-white transition">{{ __('menu.location') }}</a>
                <a href="{{ route('sitemap') }}" class="hover:text-white transition">{{ __('menu.sitemap') }}</a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 text-sm leading-7">
            
            <div>
                <h3 class="text-white font-bold text-lg mb-4 flex items-center">
                    <span class="w-1 h-4 bg-blue-600 mr-2"></span> {{ __('company.headquarters') }}
                </h3>
                <p class="mb-2 text-gray-300">{!! __('company.hq_addr') !!}</p>
                <div class="space-y-1">
                    <p class="flex"><span class="w-16 font-bold text-gray-500">Tel.</span> 052-277-8922</p>
                    <p class="flex"><span class="w-16 font-bold text-gray-500">Fax.</span> 055-293-0255</p>
                    <p class="flex"><span class="w-16 font-bold text-gray-500">E-mail.</span> <span>ghkang@foex.kr, sklee@foex.kr</span></p>
                </div>
            </div>

            <div>
                <h3 class="text-white font-bold text-lg mb-4 flex items-center">
                    <span class="w-1 h-4 bg-teal-500 mr-2"></span> {{ __('company.rnd_center') }}
                </h3>
                <p class="mb-2 text-gray-300">{!! __('company.rnd_addr') !!}</p>
                <div class="space-y-1">
                    <p class="flex"><span class="w-16 font-bold text-gray-500">Tel.</span> 055-293-0521~4</p>
                    <p class="flex"><span class="w-16 font-bold text-gray-500">Fax.</span> 055-293-0255</p>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-4 border-t border-gray-800 mt-10 pt-8 text-center md:text-left">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-gray-500">© FOEx All Rights Reserved.</p>
                
                <div class="flex space-x-4">
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="xi-facebook"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 hover:text-white transition"><i class="xi-youtube-play"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>