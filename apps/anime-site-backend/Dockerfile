FROM ghcr.io/user-komeda/docker_php:sha-9b771ff@sha256:97a8b8d1a343d047a7ccd0dc1f1002f88e91d1dd34051c48f77565d32e175170

RUN microdnf -y install git findutils && microdnf clean all

WORKDIR /app/

RUN set -eux; \
    curl --proto '=https' --tlsv1.2 -sSf https://raw.githubusercontent.com/roadrunner-server/roadrunner/master/download-latest.sh | sh; \
    # ダウンロードされた .tar.gz ファイル名を自動検出
    FILE=$(find . -maxdepth 1 -name 'roadrunner-*-linux-amd64.tar.gz' | head -n 1); \
    echo "Extracting $FILE"; \
    tar -xzvf "$FILE"; \
    DIR=$(echo "$FILE" | sed 's/\.tar\.gz$//'); \
    echo "Moving binary from $DIR"; \
    mv "$DIR/rr" /usr/bin/rr; \
    # cleanup
    rm -rf "$FILE" "$DIR"

COPY /apps/anime-site-backend/ .


RUN composer install --no-dev

CMD ["composer","start"]