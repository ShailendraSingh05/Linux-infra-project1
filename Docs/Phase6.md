####    Phase 6 - Security Hardening
# ALL CONFIGURATIONS FOR PHASE 6 ARE STORED IN: configs/phase6-security/

# This folder conteins
  1. sshd-config-hardening
  2. ufw-final-rules.txt
  3. integrity-checks.txt
  4. world-writable-files.txt 
  5. disabled-unneeded-services.txt


# Content
  1. Overview
  2. SSH Hardening
  3. Firewall Hardening (UFW)
  4. Integrity & Permissions Checks
  5. Service Cleanup
  6. Results



# 1. Overview
  -----------
# Phase 6 focused on inproving the security posture of HQ-SRV1 system and
# validatig the relibility of all previous phases.
# Security enhancements included:
  1. Hardening SSH access
  2. Restricting network exposure using UFW
  3. Checking file system integrity and permissions
  4. Disabling innecessary services


# 2. SSH Hardening
  ----------------
# SSH was hardened by modifying:
  /etc/ssh/sshd_config
# Settings applied
  PermitRootLogin no
  PasswordAuthentication no
  ChallengeResponseAuthentication no
  X11Forwarding no
  IgnoreRgosts yes
  AllowUsers alice bob charlie dave
# Reloaded with
  sudo systemctl reload ssh
# Final hardened SSH configuration stored in: 
  - sshd-config-hardened -
# Those changes mitigate brute-force attacks and limits access
# to trusted user accounts only.


# 3. Firewall Hardening (UFW)
  ---------------------------
# Firewall was reset and rebult with minimal attack surface:
  sudo ufw reset
  sudo ufw default deny incoming
  sudo  ufw default all outgoing

  sudo ufw allow ssh
  sudo ufw allow 80/tcp
  sudo ufw allow 443/tcp
  sudo allow from 192.168.50.0/24
  sudo ufw enable
# Final rule snapshot saved in:
  - ufw-final-rules.txt -
# This configuration ensures only essential services are reachable.


# 4. Service Cleanup
  ------------------
# Services not required for the project were disabled to reduce risk!
  sudo systemctl disable bluetooth.service
  sudo systemctl disable avahe-daemon
  sudo systemctl disable cups
# Alist of disabled services is stored in:
  - disabled-unneded-servicec.txt -
# Disabling unnecessary daemons minimize attack surface and iproves performace!



# 5. Result
  ---------
# Phase 6 delivered:
  1. Hardened SSH configuration
  2. Tight, minimal firewall exposure
  3. File intergrity and permission verification
  4. Removal of unnecessary services


### ALL CONFIGURATIONS AND OUTPUTS ARE LOCATED INSIDE: 
   - configs/phase6-security/
### With this phase completed, the system now meets strong security
### and operational standards!
