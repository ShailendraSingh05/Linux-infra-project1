####   Phase 5 - Processes, Services, Containers
# ALL CONFIGURATIONS FOR PHASE 5 ARE STORED IN: /configs/phase5-services-containers/

# This folder Contains
  1. hello.service
  2. hello-service.log.txt
  3. hello-service-status.txt
  4. hello-service-script.txt

# These files document the service configuration, logs, 
# and outputs from process management and container tasks.

# Content
  1. Overview
  2. Process management
  3. Systemd services
  4. Custom Service (hello.service)
  5. Valdation
  6. Results



# 1. Overview
# -----------
# Phase 5 focused on essential Linux operational Skills
  1. Managing system proccesses (ps,kill,jobs,signals)
  2. Controlling systemd services (start,stop,enable,status)
  3. Creating acustom systemd service
  4. Initializing a professional Git repository for the entire project


# 2. Custom Systemd Service -- Hello.service
# ------------------------------------------
# A custom service was created to practice unit file structure and automation
# Service Script: hello-srvice-script.sh.txt
# Script writes timestamped messages to: /var/log/hello-service.log
# Systemd Unit File: hello.service
  [Unit]
  Description=Simple Hello Service

  [Service]
  ExecStart=/usr/local/bin/helllo_service.sh

  [Install]
  WantedBy=multi-user.targer
# Service Managment
  sudo systemctl daemon-reload
  sudo systemctl enable hello.service
  sudo systemctl start hello.service
  sudo systemctl status hello.service
# Logs: hello-service.log.txt


# 3. Git Initialization & Project Structure
# -----------------------------------------
# The entire project was turned into a proffesional version-controlled repository
# Git Init
  git init
  git add
  git commit - " Initial commit for Linux Infrastructure Project"
# Repository structure:
  Linux-infra-project/
  |__ configs/
  |  |_phase1-storage/
  |  |_phase2-users/
  |  |_phase3-webstack/
  |  |_phase4-backup-logging/
  |  |_phase5-services-containers/
  |  |_phase6-security/
  |__scripts/
  |__docs/
  |__diagrams/


# 4. Validation
# -------------
# Services: hello.service started successfully
# Status and logs confirm repeatedexecution
# Git: Tree shows structure directory with 50+ files
# All configs version-controlled


# 5. Result
# ---------
# Phase 5 delivered:
# Linux process control mastery
# systemd service management
# A functional custom service
# A full initialized Git repository with proffesional structure


#### ALL CONFIGURATIONS ARE LOCATED INSIDE:
#    configs/phase5-services-containers/
