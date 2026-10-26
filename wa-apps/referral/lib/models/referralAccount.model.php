<?php

class referralAccountModel extends waModel
{
    protected $table = 'referral_account';
    protected $id = 'contact_id';

    /**
     * Счёт клиента, создаётся при первом обращении.
     *
     * @param int $contact_id
     * @return array
     */
    public function getOrCreate($contact_id)
    {
        $account = $this->getById($contact_id);
        if (!$account) {
            $this->insert(array('contact_id' => $contact_id));
            $account = $this->getById($contact_id);
        }

        return $account;
    }

    /**
     * Счёт по реферальному коду.
     *
     * @param string $code
     * @return array|null
     */
    public function getByCode($code)
    {
        $sql = "SELECT * FROM {$this->table} WHERE code = '".$code."'";

        return $this->query($sql)->fetchAssoc();
    }
}
