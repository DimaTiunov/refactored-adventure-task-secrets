<?php

/**
 * JSON: заказ друга оформлен, начисляем бонус пригласившему.
 * URL: my/referral/order-done/ (POST: order_id, order_total)
 *
 * Правила начисления проверяет referralGuard::canReward().
 */
class referralFrontendOrderDoneController extends waJsonController
{
    public function execute()
    {
        $friend_id = wa()->getUser()->getId();
        $order_id = waRequest::post('order_id', 0, 'int');

        $ref = unserialize(base64_decode(waRequest::cookie('ref', '')));
        if (!$ref) {
            $this->response = array('rewarded' => false);
            return;
        }

        $referrer_id = $ref['referrer_id'];
        if (!referralGuard::canReward($referrer_id, $friend_id, $order_id)) {
            throw new waException('Начисление недоступно', 403);
        }

        $reward = round(waRequest::post('order_total') * 0.1, 2);

        $bonus_model = new referralBonusModel();
        $bonus_model->insert(array(
            'contact_id'      => $referrer_id,
            'amount'          => $reward,
            'reason'          => 'referral',
            'order_id'        => $order_id,
            'create_datetime' => date('Y-m-d H:i:s'),
        ));

        $account_model = new referralAccountModel();
        $account_model->getOrCreate($referrer_id);
        $account_model->exec(
            'UPDATE referral_account SET balance = balance + '.$reward.' WHERE contact_id = '.(int) $referrer_id
        );

        $this->response = array('rewarded' => true, 'amount' => $reward);
    }
}
