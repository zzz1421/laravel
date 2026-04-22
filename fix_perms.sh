#!/bin/bash

# ==========================================
# FOEx 라라벨 원클릭 빌드 & 권한 복구 스크립트
# ==========================================

# 1. 프로젝트 경로 및 웹 서버 사용자 설정
PROJECT_PATH="/volume1/web/foex_new"
WEB_USER="http"
WEB_GROUP="http"

echo "=========================================="
echo " [START] FOEx Build & Permission Fix"
echo "=========================================="
PHP_BIN="/usr/local/bin/php82"

cd "$PROJECT_PATH"

# 2. Vite 및 Node 모듈 실행 권한 부여 (빌드 준비)
echo "1. Setting execution permissions for Vite..."
sudo chmod +x node_modules/vite/bin/vite.js

# 3. Vite 빌드 실행 (디자인 최신화)
echo "2. Running 'npm run build'..."
sudo npm run build

# 4. 소유권 변경 (방금 root 권한으로 빌드된 파일들 포함 모두 http로 변경)
echo "3. Changing ownership to $WEB_USER:$WEB_GROUP..."
sudo chown -R $WEB_USER:$WEB_GROUP "$PROJECT_PATH"

# 5. 폴더(755) 및 파일(644) 기본 권한 셋팅
echo "4. Setting basic directory and file permissions..."
sudo find "$PROJECT_PATH" -type d -exec chmod 755 {} \;
sudo find "$PROJECT_PATH" -type f -exec chmod 644 {} \;

# 6. 스토리지 및 캐시 폴더 쓰기 권한 부여 (777)
echo "5. Setting storage & cache permissions to 777..."
sudo chmod -R 777 "$PROJECT_PATH/storage"
sudo chmod -R 777 "$PROJECT_PATH/bootstrap/cache"

# 7. 실행 파일 권한 다시 살리기 (644로 덮였기 때문에 다시 부여)
echo "6. Restoring execution permissions for binaries..."
sudo chmod +x "$PROJECT_PATH/artisan"
sudo chmod -R +x "$PROJECT_PATH/node_modules/.bin/"

# 8. 라라벨 캐시 청소 (새로운 빌드 파일 인식)
echo "7. Clearing Laravel caches..."
sudo -u $WEB_USER $PHP_BIN artisan view:clear
sudo -u $WEB_USER $PHP_BIN artisan cache:clear
sudo -u $WEB_USER $PHP_BIN artisan config:clear

echo "=========================================="
echo " [SUCCESS] 빌드 및 권한 복구가 완료되었습니다! "
echo "=========================================="