####  Phase 4 - File Sharing (NFS), Backups, Logging, and Cron Automation
# ALL CONFIGURATIONS FOR PHASE 4 ARE STORED IN: configs/phase4-backups-logging/

# This folder contains:
  1. exports
  2. backup_company_site.sh
  3. company_health_sh.txt (script)
  4. apache2-logs.txt
  5. health-log.txt
  6. logrotate-company.conf
  7. nfs-mount-status.txt
  8. cron-root.txt
  9. cron-syslog.txt
  10. shared-folder.txt
# These represents all server-side configurations and outputs from NFS, backups,
# logging, and automation features.



# Content
# -------
  1. Overview
  2. NFS File Sharing
  3. Backup System
  4. Log Management
  5. Cron Automation
  6. Validation
  7. Results



# 1. Overview
# -----------
# Phase 4 added three major capabilities to the infrastructure:
# Centrilized file sharing via NFS
# Automated backup system with timestamped archive
# Logging infrastructure including custom log files and log rotation
# Automation via cron job for backup + health checks


# 2. NFS File Sharing
# -------------------
# NFS server instalation
  sudo apt install nfs-kernel-server -y
# Shared Directory
  /srv/shared
# Permissions
  sudo mkdir -p /srv/shared
  sudo chmod 777 /srv/shared
# NFS export Configuration Stored in: exports
  /srv/shared  192.168.50.0/24(rw,sync,no_subtree_check)
# Apply changes
  sudo exportfs -a
  sudo systemctl restart nfs-kernel-server
# Client Mount Directory: /mnt/shared
# Command
  sudo mount 192.168.50.10:srv/shared /mnt/shared
# persistent mount added to client /etc/fstab.
# Mount status saved in: nfs-mount-status.txt



# 3. Backup System
# ----------------
# A complete backup solution was created to archive the web application
# Backup Directory: /backups
# Backup Scrip: backup_company_site.sh
# Script creates timestamped archives:
  tar -czf /backups/company-site-YYYY-MM-DD_HH-MM.tar.gz /var/www/company-site
# Backup Log : /backup/backup.log



# 4. Log Management
# -----------------
# Apache Logs: apache2-logs.txt
# Custom Halth Logs: /var/log/company/health.log
# Logrotate Configuration: logrotate-company.conf



# 5. Cron Automation
# ------------------
# To major automation tasks were added:
# 1. Backup Automation: runs everyday at 2AM
  0 2 * * * /home/vboxuser/backup_company_site.sh >> /backups/backup.log 2>&1
# 2. Health Check Automation: runs every 5 minutes
  */5 * * * * /usr/local/bin/company_heath.sh
# Cron entries saved in: cron-root.txt,   cron-syslog.txt



# 6. Validation
# -------------
# NFS Validation:
# Server wrote test file to /srv/shared
# Client read from /mnt/shared
# Confirmed 2-way functionality

# Backup Validation:
# Archive created in /backups
# Timestamp format correct
# Archove contains expected site file

# Logrotate Validation:
# health.log -> health.log.gz confirmed
# Correct rotation parameters applied

# Cron Validation:
# checked via: grep CRON /var/log/syslog or sudo journalctl -u cron



# 7. Results
# ----------
# Phase 4 delivered
  1. Functional NFS share betweem HQ-SRV1 amd HQ-CLI1
  2. Automated daily backup system
  3. A custom health-check logging system
  4. Log rotation with proffesional retention policies
  5. Cron-based automation for bakcups and health monitoring

### ALL RELATED CONFIGURATIONS AND OUTPUTS ARE DOCUMENTED INSIDE 
#   configs/phase4-backups-logging/
