FROM ubuntu:latest AS shellcheck-installer
RUN apt update \
    && apt install -y shellcheck \
    && rm -rf /var/lib/apt/lists/*
