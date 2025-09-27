FROM ghcr.io/user-komeda/docker_php:sha-3de99bb@sha256:bcc6de0672fece1298c07ee35d76c78024d0608c5b4d291edb411952b459cb1d

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