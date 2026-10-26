<?php

class referralInviteModel extends waModel
{
    protected $table = 'referral_invite';

    /**
     * Приглашения клиента с поиском по e-mail.
     *
     * @param int $referrer_id
     * @param string $search
     * @return array
     */
    public function getByReferrer($referrer_id, $search = '')
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE referrer_id = ".(int) $referrer_id;

        if ($search) {
            $sql .= " AND email LIKE '%".$search."%'";
        }

        $sql .= " ORDER BY id DESC";

        return $this->query($sql)->fetchAll();
    }
}
