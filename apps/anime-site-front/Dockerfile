FROM ghcr.io/user-komeda/docker_node:sha-7b65646@sha256:618e3e78e6e46af2edfc263f81eb1e23f642c387398424e502562381e2c97a60 AS base

FROM base AS builder
#RUN microdnf update -y
#RUN apk add --no-cache libc6-compat
RUN yarn global add turbo
#RUN corepack enable
#RUN yarn set version stable
COPY . .
RUN turbo prune --scope=anime-site-front --docker

FROM base AS installer
#RUN microdnf update -y
WORKDIR /app

COPY --from=builder /out/json/ .
RUN corepack enable
RUN corepack install -g yarn@stable 
RUN yarn install
COPY --from=builder /out/full/ .
RUN yarn build


FROM base AS runner
WORKDIR /app
RUN corepack enable
RUN corepack install -g yarn@stable
#RUN addgroup --system --gid 1001 nodejs
#RUN adduser --system --uid 1001 nextjs
#USER nextjs
COPY --from=installer /app/apps/anime-site-front/build/ /app/build/
COPY --from=installer /app/apps/anime-site-front/package.json /app/
COPY --from=installer /app/node_modules /app/node_modules/
CMD ["npm","start"]
