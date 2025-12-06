#!/bin/bash

# Backup directory
BACKUP_DIR="/backups"

# Source directory to back up
SOURCE_DIR="/var/www/company-site"

# Timestamp format
DATE=$(date +"%Y-%m-%d_%H-%M")

# Backup filename
BACKUP_FILE="${BACKUP_DIR}/company-site-${DATE}.tar.gz"

# Create the backup
tar -czf "$BACKUP_FILE" "$SOURCE_DIR"

# Print result
echo "Backup completed: $BACKUP_FILE"

