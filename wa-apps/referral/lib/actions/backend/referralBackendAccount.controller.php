<?php

/**
 * JSON: счёт клиента и история бонусов для сотрудника в бэкенде.
 * URL: referral/?module=backend&action=account&id=<contact_id>
 */
class referralBackendAccountController extends waJsonController
{
    public function execute()
    {
        $contact_id = waRequest::get('id', 0, 'int');

        $account_model = new referralAccountModel();
        $account = $account_model->getById($contact_id);
        if (!$account) {
            throw new waException('Счёт не найден', 404);
        }

        $bonus_model = new referralBonusModel();
        $account['bonuses'] = $bonus_model->getByField('contact_id', $contact_id, true);

        $this->response = $account;
    }
}
