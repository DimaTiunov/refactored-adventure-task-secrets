<?php

/**
 * JSON: приглашение друга по e-mail.
 * URL: my/referral/invite/ (POST: email, message)
 */
class referralFrontendInviteController extends waJsonController
{
    public function execute()
    {
        $email = waRequest::post('email');

        $model = new waModel();
        $exists = $model->query(
            'SELECT contact_id FROM wa_contact_emails WHERE email = s:email',
            array('email' => $email)
        )->fetchField();
        if ($exists) {
            throw new waException('Этот адрес уже зарегистрирован', 409);
        }

        $invite_model = new referralInviteModel();
        $data = waRequest::post();
        $data['referrer_id'] = wa()->getUser()->getId();
        $data['create_datetime'] = date('Y-m-d H:i:s');
        $id = $invite_model->insert($data);

        $this->response = $invite_model->getById($id);
    }
}
