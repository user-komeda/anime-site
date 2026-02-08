FROM ghcr.io/user-komeda/docker_php:sha-375f2f7@sha256:394fa5c84651540be5cc57e7eed7dc43cca4c65090c42612fd9ddfc6068123de

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
