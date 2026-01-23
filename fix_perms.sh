#!/bin/bash

# ==========================================
# 라라벨 권한 원클릭 복구 스크립트
# ==========================================

# 1. 프로젝트 경로 설정 (본인 경로에 맞게 수정하세요!)
PROJECT_PATH="/volume1/web/foex_new"

# 2. 웹 서버 사용자/그룹 설정 (시놀로지: http / 우분투: www-data)
WEB_USER="http"
WEB_GROUP="http"

echo "Started fixing permissions for: $PROJECT_PATH"

# 3. 소유권 변경 (모든 파일의 주인을 웹 서버로 변경)
echo "1. Changing ownership to $WEB_USER:$WEB_GROUP..."
sudo chown -R $WEB_USER:$WEB_GROUP "$PROJECT_PATH"

# 4. 폴더 권한 755 (접근/실행 가능)
echo "2. Setting directory permissions to 755..."
sudo find "$PROJECT_PATH" -type d -exec chmod 755 {} \;

# 5. 파일 권한 644 (읽기/쓰기 가능, 실행 불가)
echo "3. Setting file permissions to 644..."
sudo find "$PROJECT_PATH" -type f -exec chmod 644 {} \;

# 6. 스토리지 및 캐시 폴더는 쓰기 권한 필수 (777)
# (개발/NAS 환경에서는 777이 정신건강에 좋습니다)
echo "4. Setting storage & cache permissions to 777..."
sudo chmod -R 777 "$PROJECT_PATH/storage"
sudo chmod -R 777 "$PROJECT_PATH/bootstrap/cache"

# 7. 라라벨 캐시 청소 (선택사항 - 오류 시 주석 처리)
echo "5. Clearing Laravel caches..."
cd "$PROJECT_PATH"
sudo -u $WEB_USER php artisan view:clear
sudo -u $WEB_USER php artisan cache:clear
sudo -u $WEB_USER php artisan config:clear

echo "=========================================="
echo " [SUCCESS] 권한 복구가 완료되었습니다! "
echo "=========================================="
