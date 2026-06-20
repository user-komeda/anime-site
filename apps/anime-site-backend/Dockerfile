# syntax=docker/dockerfile:1.24@sha256:87999aa3d42bdc6bea60565083ee17e86d1f3339802f543c0d03998580f9cb89

# ============================================================
# base
# ============================================================
FROM ghcr.io/user-komeda/docker_php:sha-da579c1@sha256:5c234efe822a526e487a4d84f6c6205354aae97a1dd6df00670f6ce73089b750 AS base
WORKDIR /app

# ============================================================
# rr-fetcher: RoadRunner バイナリ取得
# RoadRunner の Releases にはチェックサムファイルが提供されないため、
# HTTPS による通信路の保全のみに依存する（元実装と同じ方針）
# ============================================================
FROM base AS rr-fetcher
# renovate: datasource=github-releases depName=roadrunner-server/roadrunner
ARG RR_VERSION=2025.1.15

RUN microdnf -y install curl tar gzip && microdnf clean all

RUN set -eux; \
    cd /tmp; \
    curl -fsSL -o rr.tar.gz \
      "https://github.com/roadrunner-server/roadrunner/releases/download/v${RR_VERSION}/roadrunner-${RR_VERSION}-linux-amd64.tar.gz"; \
    tar -xzf rr.tar.gz; \
    install -m 0755 "/tmp/roadrunner-${RR_VERSION}-linux-amd64/rr" /usr/local/bin/rr; \
    rm -rf rr.tar.gz "/tmp/roadrunner-${RR_VERSION}-linux-amd64"

# ============================================================
# installer: composer 依存解決
# ============================================================
FROM base AS installer
RUN microdnf -y install git unzip findutils && microdnf clean all
WORKDIR /app

COPY apps/anime-site-backend/composer.json apps/anime-site-backend/composer.lock ./

RUN composer install \
      --no-dev \
      --no-scripts \
      --no-progress \
      --no-interaction \
      --prefer-dist \
      --optimize-autoloader

COPY apps/anime-site-backend/ ./
RUN composer dump-autoload --no-dev --classmap-authoritative

# ============================================================
# runner: 本番ランタイム
# ============================================================
FROM base AS runner
WORKDIR /app

RUN groupadd --system --gid 1001 phpapp \
 && useradd  --system --uid 1001 --gid phpapp --shell /sbin/nologin --no-create-home phpapp

COPY --from=rr-fetcher /usr/local/bin/rr /usr/local/bin/rr
COPY --from=installer /app /app

RUN mkdir -p /app/var/cache /app/var/log \
 && chown -R phpapp:phpapp /app/var

USER phpapp

CMD ["rr", "serve", "-c", ".rr.yaml"]
