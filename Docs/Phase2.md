###    Phase 2 - Users, Groups, Permissions, SSH, Sudo, PAM
# All configurations for phase 2 are stored in: /configs/phase2-users/


# This folder contains:
# --------------------
  1. sshd_config
  2. sudoers-managers
  3. sudoers-ops
  4. sudoers-devteam
  5. pam-common-password
  6. pam-common-auth
  7. passwd-users.txt
  8. group-users.txt


# Content:
# -------
  1. overview
  2. Users & Groups
  3. Direcory Permissions
  4. Sudo Configurations
  5. SSH Hardening
  6. PAM Security Policies
  7. Validation
  8. Results

=========================

# 1. Overview:
# ------------
# Phase 2 focuses on Linux identity & access management
# Creating users and Groups
# Applying secure group-based directory permissions
# Configuring sudo rules per group
# Hardening SSH access
# Implementing PAM authentication rules
# Ensuring secure defaults for small-company infrastructure
# These skills represent core Linux+ competecy and real-world sysadmin responsibilities

# 2. Users & Groups:
# -----------------
# Groups Created
  1. devteam
  2. ops
  3. managers

# Users created
  1. alice
  2. bob
  3. charlie
  4. dave
  5. vboxuser

# User --> Group assignments:
# user        Group
# ----        ----- 
# alice       devteam
# bob         devteam
# charlie     ops
# dave        managers


# Command used:
  sudo groupadd devtem
  sudo groupadd ops
  sudo groupadd managers

  sudo useradd -m alice
  sudo useradd -m bob
  sudo useradd -m charlie
  sudo useradd -m dave

  sudo usermod -aG devteam alice
  sudo usermod -aG devteam bob
  sudo usermod -aG ops charlie
  sudo usermod -aG managers dave

# Snapshots of /etc/passwd amd /etc/group entries are stored in:
# Passwd-users.txt
# group-users.txt


# 3. Directory Permissions:
#    ---------------------
# A structured project directory was created:
  sudo mkdir -p /srv/projects/dev
  sudo mkdir -p /srv/projects/ops
  sudo mkdir -p /srv/projects/shared
# Ownership & permissions
  sudo chown root:devteam /srv/projects/dev
  sudo chmod 770 /srv/projects/dev
  sudo chmod g+s /srv/projects/dev
# Same for ops:
  sudo chmom 770 /srv/projects/ops
  sudo chown root:ops /srv/project/ops
# Shared area:
  sudo chmod 775 /srv/projects/shared
# this ensures:
# Dev team users can collaborate in /dev
# Ops users can collaborate /ops
# Shared area open for read/write depending on need
# SGID bit ensures new files inherit group ownership.



# 4. Sudo Configuration:
# ---------------------
# Group-based sudo rules were created inside /etc/sudoers.d/.
# Managers (full sudo)
  %managers ALL=(ALL) ALL
# Ops team (restricted sudo)
  %ops ALL-NOPASSWD: /bin/systemctl
# Dev team (optional limited privileges)
  %devteam ALL=NOPASSWD: /usr/bin/apt update, /usr/bin/apt install
# Files stored in
# sudoers-managers
# sudoers-ops
# sudoers-devteam


# 5. SSH Hardening:
# -----------------
# SSH was secured by editing
  sudo nano /etc/ssh/sshd_config
# settings applied
  PermitRootLogin no
  PasswordAuthentication no
  X11Frowarding no
  AllowGroups devteam ops managers
# after changes
  sudo systemctl reload ssh
# final SSH configuration is stored in
# sshd_config



# 6.PAM Security Policies:
# ------------------------
# PAM was configured for password complexity and account lockouts
# In /etc/pam.d/common-auth
  password   required	pam_pwquality.so   retry=3 minlen=10 ucredit=-1 lcredit=-1 dcredit=-1 ocredit=-1
# In /etc/pam.d/common-auth
  auth       requited   pam_tally2.so      deny=3  unlock_time=60
# These enforce:
# Strong password
# Account lockout after 3 failed logins
# Automatic unlock after 60 seconds
# copies stored in
# pam-common-password
# pam-common-aith



# 7. Validation:
# --------------
# Test user access:
  su alice
  cd /srv/projects/dev    # allowd
  cd /srv/projects.ops    # denied
# Test sudo restrictions:
  su charlie
  sudo systemctl status ssh   # allowed
  sudo apt install htop       # denied
# Test PAM lockout:
# entered wrong password 3 times --> account temporarily locked
# Test SSH:
# Only users belonging to allowed groups may log in



# 8. Results:
# -----------
# Phase 2 delivered:
# A full identity & access comtrol sustem
# Proper directory permissions
# Secure sudo rules
# Hardened SSH
# Enforced passoed policies
# PAM-based login protectio

##### ALL RELATED FILES AND OUTPUTS ARE STORED IN: configs/phase2-users/
##### This phase established a strong foundation for security and controlled system access!!!
