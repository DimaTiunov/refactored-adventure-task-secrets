<?php

/**
 * Страница «Приведи друга» в личном кабинете.
 * URL: my/referral/
 */
class referralFrontendMyReferralAction extends waViewAction
{
    public function execute()
    {
        $contact_id = wa()->getUser()->getId();

        $account_model = new referralAccountModel();
        $invite_model = new referralInviteModel();

        $this->view->assign('account', $account_model->getOrCreate($contact_id));
        $this->view->assign('invites', $invite_model->getByReferrer($contact_id));
    }
}
