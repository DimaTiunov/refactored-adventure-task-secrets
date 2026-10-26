<?php

/**
 * JSON: ручная корректировка бонусов клиента сотрудником.
 * URL: referral/?module=backend&action=adjust (POST: contact_id, delta, reason)
 */
class referralBackendAdjustController extends waJsonController
{
    public function execute()
    {
        $contact_id = waRequest::post('contact_id', 0, 'int');
        $delta = waRequest::post('delta');

        $account_model = new referralAccountModel();
        $account = $account_model->getOrCreate($contact_id);
        $account_model->updateById($contact_id, array('balance' => $account['balance'] + $delta));

        $bonus_model = new referralBonusModel();
        $bonus_model->insert(array(
            'contact_id'      => $contact_id,
            'amount'          => $delta,
            'reason'          => waRequest::post('reason'),
            'create_datetime' => date('Y-m-d H:i:s'),
        ));

        $this->response = $account_model->getById($contact_id);
    }
}
