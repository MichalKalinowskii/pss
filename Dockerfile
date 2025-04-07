FROM ubuntu:latest
LABEL authors="sawcz"

ENTRYPOINT ["top", "-b"]