#!/bin/bash

echo "==================================="
echo "  Vite 서버 재시작 스크립트 (NAS용)"
echo "==================================="

echo -e "\n1. 기존 Vite 서버를 종료하는 중..."

# lsof 대신 모든 리눅스에 내장된 ps 명령어로 'vite' 프로세스를 찾아냅니다.
PIDs=$(ps -ef | grep -i "[v]ite" | awk '{print $2}')

if [ ! -z "$PIDs" ]; then
  for PID in $PIDs; do
    kill -9 $PID 2>/dev/null
    echo "프로세스($PID) 종료 완료!"
  done
else
  echo "실행 중인 Vite 서버가 없습니다."
fi

echo -e "\n2. 백그라운드에서 새 서버를 시작합니다..."
# 기존 로그를 지우고 새롭게 시작
nohup npm run dev > vite.log 2>&1 &

echo -e "\n완료되었습니다! (로그는 vite.log 파일에서 확인 가능)"