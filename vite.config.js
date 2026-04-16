import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// 🚨 basicSsl 관련 줄은 지워주세요! NAS가 알아서 해줍니다.

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    server: {
        host: '0.0.0.0',
        port: 5176, // 내부적으로는 5176으로 실행
        strictPort: true,
        // https: true, // 🚨 이것도 지웁니다 (NAS가 처리함)
        
        hmr: {
            host: 'www.foex.kr',
            clientPort: 5180,  // 👈 브라우저는 5180 포트(프록시)로 접속하라고 지시!
            protocol: 'wss',   // 웹소켓은 보안(wss) 사용
        },
        watch: {
            ignored: [
                '**/storage/**',
                '**/vendor/**',
                '**/.git/**'
            ]
        }
    }
});