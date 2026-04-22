#!/bin/bash

# ==========================================
# FOEx 빠른 프론트엔드(Vite) 빌드 스크립트
# ==========================================

PROJECT_PATH="/volume1/web/foex_new"
WEB_USER="http"
WEB_GROUP="http"

echo "=========================================="
echo " [START] FOEx Quick Build"
echo "=========================================="

cd "$PROJECT_PATH"

# 1. Vite 실행 권한 확인/부여
echo "1. Setting execution permissions for Vite..."
sudo chmod +x node_modules/vite/bin/vite.js

# 2. Vite 빌드 실행 (새로운 CSS/JS 생성)
echo "2. Running 'npm run build'..."
sudo npm run build

# 3. 새로 생성된 빌드 파일들의 소유권을 웹 서버(http)로 반환
# 전체 폴더를 다 돌리지 않고, 빌드 결과물이 모이는 public 폴더 위주로만 빠르게 처리합니다.
echo "3. Restoring ownership for built files..."
sudo chown -R $WEB_USER:$WEB_GROUP "$PROJECT_PATH/public"

echo "=========================================="
echo " [SUCCESS] 빠른 빌드가 완료되었습니다! "
echo "=========================================="