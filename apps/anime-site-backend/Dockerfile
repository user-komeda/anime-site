FROM ghcr.io/user-komeda/docker_php:sha-da579c1@sha256:5c234efe822a526e487a4d84f6c6205354aae97a1dd6df00670f6ce73089b750

RUN microdnf -y install git findutils && microdnf clean all

WORKDIR /app/

RUN set -eux; \
    RR_VERSION="2025.1.2"; \
    curl -sSL -o rr.tar.gz "https://github.com/roadrunner-server/roadrunner/releases/download/v${RR_VERSION}/roadrunner-${RR_VERSION}-linux-amd64.tar.gz"; \
    tar -xzvf rr.tar.gz; \
    mv roadrunner-${RR_VERSION}-linux-amd64/rr /usr/bin/rr; \
    rm -rf rr.tar.gz roadrunner-${RR_VERSION}-linux-amd64

COPY /apps/anime-site-backend/ .


RUN composer install --no-dev

CMD ["composer","start"]
