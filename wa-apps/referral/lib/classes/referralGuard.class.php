<?php

/**
 * Проверки реферальной программы.
 */
class referralGuard
{
    /**
     * Можно ли начислить бонус рефереру за заказ друга.
     *
     * @param int $referrer_id
     * @param int $friend_id
     * @param int $order_id
     * @return bool
     */
    public static function canReward($referrer_id, $friend_id, $order_id)
    {
        // TODO: не самому себе, только за первый заказ друга, один раз за заказ
        return true;
    }

    /**
     * Безопасен ли адрес для серверного запроса.
     *
     * @param string $url
     * @return bool
     */
    public static function isSafeUrl($url)
    {
        // TODO: схема http/https, запрет внутренних адресов
        return true;
    }
}
