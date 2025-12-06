###    Phase 4 - Networking, Firewall, Web Server, Database, PHP Application
# ALL CONFIGURATIONS FOR PHASE 3 ARE STORED IN: /configs/phase3-webstack/

# This forlder contains:
# ----------------------
  1. apache-vhost.conf
  2. apache-status.txt
  3. companydb-schema.sql
  4. employees.php
  5. index.html
  6. hosts
  7. curl-localhost.txt
  8. ping-h1-cli1.txt
  9. netplan.txt
  10. mariaDB.txt
  11. ufw-rules.txt
  12. hostname.txt

# These files document every step of the web stack: from network configuration
# to database schema and PHP code.



# Content
 1. Overview
 2. Networking Configuration
 3. Firewall Rules
 4. Apache Web Server
 5. Website Deployment
 6. MariaDB Database
 7. PHP Dynamic Application
 8. Validation
 9. Results
------------------------------------------------


# 1. Overview
# -----------
# Phase 3 focused on building a complete internal web application environment
# for the small-company infrastructure
# Configuring hostname and static IPs
# Hardening firewall access
# Installing Apache web server
# Deploying a company website
# Building a MariaDB employees database
# Writing a PHP scrip that dynamically displays employees
# Validating connection across client and server.


# 2. Networking Configuration
# ---------------------------
# Static IPs Assigned
 1. HQ-SRV1: 192.168.50.10/24
 2. HQ-CLI1: 192.168.50.20/24
# Hostname Configuration
   sudo hostnamectl set-hostname hq-srv1.local
   sudo hostnamectl set-hostname hq-cli1.local
# /etc/hosts/entries
  192.168.50.10  intranet.corp.local  hq-srv1
  192.168.50.20  hq-cli1.corp.local   hq-cli1
# Connectivity Testing
  ping intranet.corp.local
  ping 192.168.50.10



# 3. Firewall Rules (UFW)
# ----------------------
# Firewall was configure to allow anly essential services
  sudo ufw default deny incoming
  sudo ufw defult allow outgoing

  sudo ufw allow ssh
  sudo ufw allow 80/tcp
  sudo ufw allow 443/tcp
  sudo ufw allow from 192.168.50.0/24
  sudo ufw enable
# Final rules are documented: ufw-rules.txt
# This provides minimal-attack-surface configuration



# 4. Apache Web Server
# --------------------
# Instalation
  sudo apt install apache2 -y
  sudo systemctl enable apache2
  sudo systemctl start apache2
# Virtual Host Configuration: -->
# File is Stores in: configs/phase3-webstack/apache-vhost.txt
#                    ----------------------------------------
# Apache status output stored in: apache-status.txt
#                                 -----------------



# 5. Website Deployment
# ---------------------
# Directory: /var/www/company-site
#            ---------------------
# Homepage: index.html
#           ----------
# Curl test result: curl-localhost.txt
#                   ------------------



# 6. MariaDB Database
# -------------------
# MariaDB installed
  sudo apt install mariadb-server -y
  sudo systemctl enable mariadb
  sudo systemctl start mariadb
# Database created
  companydb
# Table created
  employees (id, name, department)
# User created for PHP
  webuser@localhost
# Schema dump saved in: companydb-schema.sql
#                       --------------------



# 7. PHP Dynamic Application
# --------------------------
# Website includes dynamic employee listing
# Stored in: employees.php
# This scrip connects to MariaDB, Fetches Employees, Displays them in HTML table format



# 8. Validation
# -------------
# Apache responding on port 80
# Homepage loads from client
# PHP evaluated correctly
# Database connection successful
# Employee data displays in browser
# UFW allow only from internal network
# Hostname resolution works on both machines



# 9. Results
# ----------
# Phase 3 delivered a full working intranet application, secured behind firewall
# rules and backed by MariaDB database.
# This phase successfuly integrated Networking, Web serving, Database, Application layer
# and forms the core of the small company's internal IT services

# All related configs and outputs are stored under: configs/phase3-webstack/
