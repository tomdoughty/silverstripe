FROM node:lts AS frontend

WORKDIR /node/frontend

COPY ./frontend/package.json ./package.json
COPY ./frontend/package-lock.json ./package-lock.json

RUN npm install

COPY ./frontend .

RUN npm run build

FROM brettt89/silverstripe-web:7.4-apache
ENV DOCUMENT_ROOT /usr/src/myapp

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . $DOCUMENT_ROOT
COPY --from=frontend /node/public $DOCUMENT_ROOT/public

WORKDIR $DOCUMENT_ROOT

RUN composer install
