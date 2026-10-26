<?php

/**
 * JSON: списание бонусов клиента в счёт заказа.
 * URL: my/referral/spend/ (POST: points, order_id)
 */
class referralFrontendSpendController extends waJsonController
{
    public function execute()
    {
        $contact_id = wa()->getUser()->getId();
        $points = waRequest::post('points');

        $account_model = new referralAccountModel();
        $account = $account_model->getOrCreate($contact_id);
        if ($account['balance'] < $points) {
            throw new waException('Недостаточно бонусов', 400);
        }

        $account_model->updateById($contact_id, array('balance' => $account['balance'] - $points));

        $bonus_model = new referralBonusModel();
        $bonus_model->insert(array(
            'contact_id'      => $contact_id,
            'amount'          => -$points,
            'reason'          => 'spend',
            'order_id'        => waRequest::post('order_id', 0, 'int'),
            'create_datetime' => date('Y-m-d H:i:s'),
        ));

        $this->response = $account_model->getById($contact_id);
    }
}
