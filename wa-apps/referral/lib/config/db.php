<?php

return array(
    'referral_account' => array(
        'contact_id' => array('int', 11, 'null' => 0),
        'code'       => array('varchar', 16, 'null' => 0, 'default' => ''),
        'balance'    => array('decimal', "15,2", 'null' => 0, 'default' => '0.00'),
        'notify_url' => array('varchar', 255, 'null' => 0, 'default' => ''),
        ':keys'      => array(
            'PRIMARY' => 'contact_id',
            'code'    => 'code',
        ),
    ),
    'referral_invite' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'referrer_id'     => array('int', 11, 'null' => 0),
        'email'           => array('varchar', 255, 'null' => 0, 'default' => ''),
        'message'         => array('varchar', 500, 'null' => 0, 'default' => ''),
        'status'          => array('varchar', 16, 'null' => 0, 'default' => 'sent'),
        'internal_note'   => array('varchar', 255, 'null' => 0, 'default' => ''),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'     => 'id',
            'referrer_id' => 'referrer_id',
        ),
    ),
    'referral_bonus' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'contact_id'      => array('int', 11, 'null' => 0),
        'amount'          => array('decimal', "15,2", 'null' => 0, 'default' => '0.00'),
        'reason'          => array('varchar', 64, 'null' => 0, 'default' => ''),
        'order_id'        => array('int', 11, 'null' => 0, 'default' => '0'),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'    => 'id',
            'contact_id' => 'contact_id',
        ),
    ),
);
