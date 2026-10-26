<?php

/**
 * JSON: список приглашений клиента с поиском.
 * URL: my/referral/invites/?q=
 */
class referralFrontendInvitesController extends waJsonController
{
    public function execute()
    {
        $model = new referralInviteModel();

        $this->response = $model->getByReferrer(
            wa()->getUser()->getId(),
            waRequest::get('q')
        );
    }
}
