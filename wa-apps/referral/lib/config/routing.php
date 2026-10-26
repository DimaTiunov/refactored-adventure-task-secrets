<?php

return array(
    'my/referral/'                 => 'frontend/myReferral',
    'my/referral/code/'            => 'frontend/code',
    'my/referral/invite/'          => 'frontend/invite',
    'my/referral/invites/'         => 'frontend/invites',
    'my/referral/invite/<id:\d+>/' => 'frontend/inviteCard',
    'my/referral/notify/'          => 'frontend/notify',
    'my/referral/spend/'           => 'frontend/spend',
    'my/referral/order-done/'      => 'frontend/orderDone',
    'r/<code:[a-z0-9]+>/'          => 'frontend/landing',
);
