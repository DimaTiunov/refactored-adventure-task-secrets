<?php

/**
 * Переход друга по реферальной ссылке: запоминаем, кто пригласил, и отправляем дальше.
 * URL: r/<code>/?return=
 */
class referralFrontendLandingController extends waController
{
    public function execute()
    {
        $account_model = new referralAccountModel();
        $account = $account_model->getByCode(waRequest::param('code'));

        if ($account) {
            $ref = base64_encode(serialize(array(
                'code'        => $account['code'],
                'referrer_id' => $account['contact_id'],
                'ts'          => time(),
            )));
            // подписанный cookie, как в новых версиях фреймворка
            wa()->getResponse()->setSignedCookie('ref', $ref, time() + 30 * 86400, '/');
        }

        $return = waRequest::get('return', wa()->getRootUrl());
        wa()->getResponse()->redirect($return);
    }
}
