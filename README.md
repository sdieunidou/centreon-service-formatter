# centreon-service-formatter

@deprecated ; dont use it

# Example

Formatter / Metric extrator for Centreon Services

Ex: (2eme ligne = métric extraite)

```
[CPU_Load][normal] CPU Usage : 6 %
    [cpu_usage] 6 percent

[CPU_Model][normal] CPU Model : Intel(R) Xeon(R) CPU D-1520 @ 2.20GHz

[Disk_IO_sda][normal] DISKIO OK - No Problems found (Write 0 MB/s)
    [disk_write] 0 MB/s

[Disk_IO_sdb][normal] DISKIO OK - No Problems found (Write 0 MB/s)
    [disk_write] 0 MB/s

[Disk_IO_sdc][warning] DISKIO OK - No Problems found (Write 1 MB/s)
    [disk_write] 1 MB/s
```
