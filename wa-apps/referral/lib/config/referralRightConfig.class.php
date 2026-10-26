<?php

class referralRightConfig extends waRightConfig
{
    public function init()
    {
        // Сотрудник может смотреть счета клиентов и корректировать бонусы в бэкенде
        $this->addItem('manage_referrals', 'Работа с реферальной программой', 'checkbox');
    }
}
