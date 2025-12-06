##    Storage Architecture Diagram
# All configurations for phase 1 are stored in: /configs/phase1-storage/

##Content
 1. RAID Configuration
 2. LVM Setup
 3. Filesystem + Mount
 4. Swap
 5. Validation
 6. Results


# Phase 1 - Storage Setup (RAID10,LVM,Swap)

# Overview:
# In Phase 1, the goal was to design and configure a reliable, flexible, and enterprise-style Linux storage
# layout for the HQ-SRV1 system.

# This included:
# - Creating a RAID10 array for redundancy + performance
# - Build LVM on top of RAID
# - Create and mount a dedicated filesystem for /srv/projects
# - Configure a Swap file
# - Ensure persistence via /etc/fstab
# - Document the entire storage stack

# STORAGE ARCHITECTURE DIAGRAM:
# ----------------------------
# 4 Physical Disks (dev/sdb, dev/sdc, dev/sde, dev/sdd) -->
# RAID10 array (dev/md0) -->
# LVM Physical Volume (PV) -->
# Volume Groupe (vg-data) -->
# Logical Volume (lv-projects) -->
# Filesystem (ext4) -->
# Mounted at srv/projects

---------------------------------------------------------------------------------------

# 1. RAID10 Configuration:
#    --------------------
# A RAID array was created using 4 disks:
  sudo mdadm --create /dev/md0 --level=10 /dev/sdb /dev/sdc /dev/sdd /dev/sde
# The final RAID Configuration is documented in: (configs/phase1-storage/mdadm.conf) (conf/phase-storage/lsblk.txt)


# 2. LVM Setup:
#    ---------
# Physical Volume (PV)
  sudo pvcreate /dev/md0
# Volume Groupe (VG)
  sudo vgcreate vg-data /dev/md0
# Logical Volume (LV)
  sudo lvcreate -l 5G -n lv-projects
# LVM details are stored in: (lvm-pvs.txt, lvm-vgs.txt, lvm-lvs.txt)


# 3. Filesystem + Mount Point:
#    ------------------------
# Filesystem created
  sudo mkfs.ext4 /dev/vg-data/lv-projects
# Mounted at
  sudo mkdir -p /srv/projcts
  sudo mount /dev/vg-data/projects /srv/projects
# mount information saved in: (df-h.txt, configs/phase1-storage/fstab) 



# 4. Swap File Configuration:
#    -----------------------
# Swap file was created for additional memory stability
  sudo fallocate -l 2G /swapfile
  sudo chmod 600 /swapfile
  sudo mkswap /swapfile
  sudo swapon /swapfile
# Swap information is tored in file: swap-info.txt which contains: Active swap device, fstab swap entry


# 5. Validation & Verifiction:
#    ------------------------
# the followong tools were used to verify storage
  lsblk     --- Disk + RAID + LVM hiorarchy
  df -h     --- Mounted filesystems
  mount     --- Mount status
  swapon -s --- Swap file status


# Result:
# ------
# Phase 1 delivered a production-ready storage subsystem:
# RAID10 protects againts disk failure
# LVM provides flexibility for resizing
# Swap ensures system stability
# everything persists across reboot

# This Foundation supports all phases of the project. 


# OUTPUTS ARE INCLUDED INSIDE THE PHASE1 CONFIG FOLDER
