<?php

/**
 * JSON: выдача реферального кода клиенту.
 * URL: my/referral/code/ (POST)
 */
class referralFrontendCodeController extends waJsonController
{
    public function execute()
    {
        $contact_id = wa()->getUser()->getId();

        $account_model = new referralAccountModel();
        $account = $account_model->getOrCreate($contact_id);

        if (!$account['code']) {
            $code = substr(md5(time()), 0, 8);
            $account_model->updateById($contact_id, array('code' => $code));
            $account['code'] = $code;
        }

        $this->response = $account;
    }
}
