<?php

final class ServiceStatus
{
    const STATUS_OK = 0;
    const STATUS_WARNING = 1;
    const STATUS_CRITICAL = 2;
    const STATUS_UNKNOWN = 3;

    /**
     * @param int $status
     *
     * @return string
     */
    public static function getStatusLabel($status)
    {
        switch ($status) {
            case 0:
                return 'normal';

            case 1:
                return 'warning';

            case 2:
                return 'critical';

            default:
                return $status;
        }
    }
}
