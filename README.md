### Linux Infrastucture Project (Complete 6-Phase Sysadmin Build)
# A full documented, multi-phase Linux infrastructure environment 
# designed and build to simulate a small-comopany server architecture
# using real-world system administration practices.

# This project includes:
  1. RAID + LVM storage
  2. Users, groups, permissions, sudo,SSH
  3. Networking, firewall, Apache, PHP, MariaDB
  4. Backups, loggings, cron automation
  5. Services, containers, Git Verioning
  6. Security hardening
# All configurations, scripts, and logs are included and organized cleanly by phases.

# Project Structure
  -----------------
  Linux-infra-project/
  |__ configs\
  |  |__ Phase1-storage/
  |  |__ Phase2-Users/
  |  |__ Phase3-webstack/
  |  |__ Phase4-backup-logging/
  |  |__ Phase5-services-containers/
  |  |__ Phase6-security/
  |
  |__ scripts/
  |  |__ backup_company_site.sh
  |  |__ company_health.sh
  |
  |__ docs/
  |  |__ Phase1.md
  |  |__ Phase2.md
  |  |__ Phase3.md
  |  |__ Phase4.md
  |  |__ Phase5.md
  |  |__ Phase6.md
  |
  |__ diagrams/



# Summary of Each Phase
  ---------------------
# Phase 1 -- Stoage Setup(RAID10,LVM,Swap)
# Built enterprise-style storage using:
  1. RAID10 with 4 disks
  2. LVM (PV, VG, LV)
  3. Mounted filesystem at /srv/projects
  4. Swap file configuration
# All outputs stored in configs/phase1-storage/.


# Phase 2 -- Users, Groups, Permissions, SSH, Sudo, PAM.
  1. Created users/groups (devteam,ops,managers)
  2. SGID and permisison-based shared directory
  3. Sudo privilege seperation
  4. SSH hardening
  5. PAM password + lockout policies
# All configs in configs/Pahse2-users/.


# Phase 3 -- Web stack (Networking, Apache, MariaDB, PHP)
# Created full inernal web application:
  1. Static IP + hostname setup
  2. UFW firewall rules
  3. Apache virtual host for intranet.corp.local
  4. MariaDB employees database
  5. PHP dynamic table displaying validation
  6. Client/server connectivity validation
# All Configs in configs/phase3-webstack/.


# Phase 4 -- NFS File Sharing, Backups, Logging, Cron
# Implemented operational reliability
  1. NFS shared folder between server & client
  2. Automated backup script with timestamp rotation
  3. Custom health logging system
  4. Logrotate configuration
  5. Cron jobs for backups & health checks
# All configs in configs/phase4-backup-logging/.


# Phase 5 -- Processes, Services, Contaners,Git
# Focused on operational sysadmin skills:
  1. ps/top/signal management
  2. systemd service creation(hello.service)
  3. Docker container (nginx) deployment
  4. Full Git repository initialization
# All configs in configs/phase5-services-containers/.


# Phase 6 -- Security
# Final Phase with production-grade security:
  1. SSH hardening
  2. UFW minimal-attack-surface rules
  3. File integrity _ permission checks
  4. Disabled unnecessery services
# All config in configs/phase6-security/.


# Skills Demonstrated
  1. RAID,LVM,fstab
  2. Users, groups, sudo,PAM
  3. SSH hardening
  4. Systemctl, journald
  5. Apache + PHP + MariaDB stack
  6. NFS server/client
  7. Cron + backups
  8. Logrotate
  9. Networking configuration
  10. UFW firewall
  11. Docker basics
  12. Git repository management

# Professional Capabilities
  1. Documentation Structuring
  2. Config management discipline
  3. Real troubleshooting approache
  4. Security
  5. Infrastructure organization by phase

# How to navigate this project
# If you are a recruter, hiring manager, or mentor:
  1. Start with the docs/ folder --> Phase1 --> Phase6
  2. Then explore configs/ to see the real system files
  3. View scripts/ for automation examples
  4. Use tree output (phase5.md) to undertand the structure
