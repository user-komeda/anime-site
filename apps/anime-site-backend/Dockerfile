# syntax=docker/dockerfile:1.28@sha256:bb22d9815c728170f72750f4e5b0d672e06176142e1d602c7e66c050100b7e5b

# ============================================================
# base
# ============================================================
FROM ghcr.io/user-komeda/docker_php:sha-16edb23@sha256:d83558a19ec43f0208d48d2526aa7264c699a74dd0864c1ec514ca88d0b8809a AS base
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
