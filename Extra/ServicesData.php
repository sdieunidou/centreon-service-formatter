<?php

final class ServicesData
{
    /**
     * @return array
     */
    public static function getServicesData()
    {
        return [
            [
                'name' => 'CPU_Load',
                'desc' => 'CPU Usage : 6 %',
                'status' => 0,
            ],
            [
                'name' => 'CPU_Model',
                'desc' => 'CPU Model : Intel(R) Xeon(R) CPU D-1520 @ 2.20GHz',
                'status' => 0,
            ],
            [
                'name' => 'Disk_IO_sda',
                'desc' => 'DISKIO OK - No Problems found (Write 0 MB/s)',
                'status' => 0,
            ],
            [
                'name' => 'Disk_IO_sdb',
                'desc' => 'DISKIO OK - No Problems found (Write 0 MB/s)',
                'status' => 0,
            ],
            [
                'name' => 'Disk_IO_sdc',
                'desc' => 'DISKIO OK - No Problems found (Write 1 MB/s)',
                'status' => 1,
            ],
            [
                'name' => 'Disk_space',
                'desc' => '/sys/fs/cgroup: 0%used(0GB/16GB) /var/www: 78%used(153GB/197GB) /run/lock: 0%used(0GB/0GB) /run: 10%used(2GB/16GB) /srv/backup: 30%used(9740GB/32453GB) /dev/shm: 0%used(0GB/16GB) /home: 0%used(0GB/49GB) /var/lib/mysql: 8%used(8GB/98GB) /: 19%used(9GB/48GB) (&lt;80%) : OK',
                'status' => 2,
            ],
            [
                'name' => 'HTTP/PHP',
                'desc' => 'HTTP OK: HTTP/1.1 200 OK - 178 octets en 0,021 secondes de temps de réponse',
                'status' => 0,
            ],
            [
                'name' => 'Inodes',
                'desc' => 'OK Inodes : ( /var/www = 9% ) ( / = 5% ) ( /home = 1% ) ( /dev = 1% ) ( /dev/shm = 1% ) ( /sys/fs/cgroup = 1% ) ( /srv/backup = 1% ) ( /var/lib/mysql = 1% )',
                'status' => 3,
            ],
            [
                'name' => 'Kernel_version',
                'desc' => 'Kernel version : 4.9.8-xxxx-std-ipv6-64',
                'status' => 0,
            ],
            [
                'name' => 'Load_average',
                'desc' => 'Load average: 0.74, 0.68, 0.65.',
                'status' => 0,
            ],
            [
                'name' => 'Memory',
                'desc' => 'MEMORY OK : RAM=58% (18953M/32128M) - SWAP=1% (170M/12284M) - Cached=29% (9326M) - Buffer=5% (1851M)',
                'status' => 0,
            ],
            [
                'name' => 'Mountpoints',
                'desc' => 'Mountpoints OK : all mounts were found (/srv/backup )',
                'status' => 0,
            ],
            [
                'name' => 'MySQL',
                'desc' => 'MySQL OK (55/200) - QPS = 9.0 - QCache Hitrate = 0%',
                'status' => 0,
            ],
            [
                'name' => 'Network_eth0',
                'desc' => 'Traffic In : 90.34 kb/s (0.0 %), Out : 397.99 kb/s (0.0 %)',
                'status' => 0,
            ],
            [
                'name' => 'Ping',
                'desc' => 'OK - 149.202.80.30: rta 3,138ms, lost 0%',
                'status' => 0,
            ],
            [
                'name' => 'Postfix_queue',
                'desc' => 'CRITICAL: postfix mailq is 50401 (threshold c = 500)',
                'status' => 0,
            ],
        ];
    }
}
