FROM brettt89/silverstripe-web:7.4-apache
ENV DOCUMENT_ROOT /usr/src/myapp

COPY . $DOCUMENT_ROOT
WORKDIR $DOCUMENT_ROOT
