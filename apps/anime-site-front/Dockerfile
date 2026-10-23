FROM ghcr.io/user-komeda/docker_node:sha-fefe12b@sha256:bf92ea16fd95f3d02a1726f2c10cec618af4f0d0a67b2ea02c1dcd8f350a971e AS base
WORKDIR /app

# ============================================================
# builder: turbo prune でフロントに必要な部分だけを抽出
# ============================================================
FROM base AS builder
COPY . .
RUN corepack enable && yarn dlx turbo prune --scope=anime-site-front --docker

# ============================================================
# installer: 依存解決 + ビルド
# ============================================================
FROM base AS installer
RUN corepack enable
COPY --from=builder /app/out/json/ .
RUN yarn install --immutable
COPY --from=builder /app/out/full/ .
RUN yarn build

# ============================================================
# runner: 本番ランタイム（AlmaLinux ベース）
# ============================================================
FROM base AS runner
WORKDIR /app

RUN corepack enable

# AlmaLinux(RHEL系) で非rootユーザーを作成
RUN groupadd --system --gid 1001 nodejs \
 && useradd  --system --uid 1001 --gid nodejs \
             --create-home --home-dir /home/nextjs \
             --shell /sbin/nologin \
             nextjs
# 所有者は root のまま（書き換え不可にする）
COPY --from=installer /app/apps/anime-site-front/build/        /app/build/
COPY --from=installer /app/apps/anime-site-front/package.json  /app/package.json
COPY --from=installer /app/node_modules/                       /app/node_modules/

USER nextjs

CMD ["node_modules/.bin/react-router-serve", "./build/server/index.js"]
