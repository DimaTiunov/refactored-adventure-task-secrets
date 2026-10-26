<?php

/**
 * JSON: карточка приглашения.
 * URL: my/referral/invite/<id>/
 */
class referralFrontendInviteCardController extends waJsonController
{
    public function execute()
    {
        $model = new referralInviteModel();
        $invite = $model->getById(waRequest::param('id', 0, 'int'));
        if (!$invite) {
            throw new waException('Приглашение не найдено', 404);
        }

        $this->response = $invite;
    }
}
