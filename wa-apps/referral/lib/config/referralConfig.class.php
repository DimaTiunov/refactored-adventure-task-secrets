<?php

class referralConfig extends waAppConfig
{
    /**
     * Начисление бонусов (самому себе нельзя, только за первый заказ, один раз)
     * проверяет referralGuard::canReward(), а безопасность адреса уведомлений
     * проверяет referralGuard::isSafeUrl(), поэтому в контроллерах повторно
     * это проверять не нужно.
     */
}
