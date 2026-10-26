<?php

/**
 * JSON: адрес для уведомлений о регистрации друзей и тестовый запрос на него.
 * URL: my/referral/notify/ (POST: url)
 *
 * Безопасность адреса проверяет referralGuard::isSafeUrl().
 */
class referralFrontendNotifyController extends waJsonController
{
    public function execute()
    {
        $url = waRequest::post('url');
        if (!referralGuard::isSafeUrl($url)) {
            throw new waException('Небезопасный адрес', 400);
        }

        $account_model = new referralAccountModel();
        $account_model->getOrCreate(wa()->getUser()->getId());
        $account_model->updateById(wa()->getUser()->getId(), array('notify_url' => $url));

        // тестовый запрос, чтобы клиент увидел, что адрес отвечает
        $net = new waNet(array('timeout' => 10));
        $body = $net->query($url);

        $this->response = array('status' => 'ok', 'body' => $body);
    }
}
