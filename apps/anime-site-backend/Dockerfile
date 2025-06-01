FROM ghcr.io/user-komeda/docker_php:sha-9b771ff@sha256:59b692192e99cc7260a59b6cdc0c7244e3d5db6630ce13d49fcc61d7f747e729

RUN mkdir app
RUN microdnf -y install git

WORKDIR /app/

COPY . .

RUN curl --proto '=https' --tlsv1.2 -sSf  https://raw.githubusercontent.com/roadrunner-server/roadrunner/master/download-latest.sh | sh && tar -xzvf roadrunner-2025.1.1-linux-amd64.tar.gz && mv roadrunner-2025.1.1-linux-amd64/rr /usr/bin

RUN composer install --no-dev

CMD ["composer","start"]

