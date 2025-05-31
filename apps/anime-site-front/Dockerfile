FROM ghcr.io/user-komeda/docker_node:sha-304b09e@sha256:cae366f377ce91cfc4a8fab9a64a28e80d0fad90d4aa0413e392700bb3d3a5d0 as base

FROM base AS builder
RUN microdnf update -y
RUN microdnf install -y libc6-compat
RUN yarn global add turbo
COPY . .
RUN turbo prune anime-site-front --docker

FROM base AS installer
RUN microdnf update -y
RUN microdnf install -y libc6-compat
WORKDIR /app
COPY --from=builder /app/out/json/ .
RUN yarn install
COPY --from=builder /app/out/full/ .
RUN yarn build

FROM base AS runner
WORKDIR /app
RUN addgroup --system --gid 1001 nodejs
RUN adduser --system --uid 1001 nextjs
USER nextjs
COPY --from=build-env /app/build /app/build
CMD ["npm", "run", "start"]
