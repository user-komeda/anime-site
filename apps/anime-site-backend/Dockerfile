FROM ghcr.io/user-komeda/docker_php:sha-9b771ff@sha256:97a8b8d1a343d047a7ccd0dc1f1002f88e91d1dd34051c48f77565d32e175170

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