# Referral: «Приведи друга» для Webasyst

Учебное приложение для собеседования: клиент получает реферальную ссылку и приглашает друзей, за первый заказ друга начисляются бонусы, бонусы можно тратить. Сотрудник смотрит счета и корректирует бонусы.

## Структура

```
wa-apps/referral/
├── lib/
│   ├── config/        app.php, db.php, routing.php, права, конфиг приложения
│   ├── models/        referralAccountModel, referralInviteModel, referralBonusModel
│   ├── classes/       referralGuard
│   └── actions/
│       ├── frontend/  личный кабинет и публичная реферальная ссылка
│       └── backend/   счёт и корректировка бонусов для сотрудника
├── templates/         Smarty-шаблон «Приведи друга»
└── js/referral.js     поиск приглашений, отправка форм (jQuery)
```

## Маршруты

| URL | Обработчик |
|---|---|
| `my/referral/` | `referralFrontendMyReferralAction`, страница «Приведи друга» |
| `my/referral/code/` | `referralFrontendCodeController`, выдача кода (POST) |
| `my/referral/invite/` | `referralFrontendInviteController`, приглашение (POST: `email`, `message`) |
| `my/referral/invites/?q=` | `referralFrontendInvitesController`, JSON-список приглашений |
| `my/referral/invite/<id>/` | `referralFrontendInviteCardController`, JSON-карточка |
| `my/referral/notify/` | `referralFrontendNotifyController`, адрес уведомлений и тестовый запрос (POST: `url`) |
| `my/referral/spend/` | `referralFrontendSpendController`, списание бонусов (POST: `points`, `order_id`) |
| `my/referral/order-done/` | `referralFrontendOrderDoneController`, начисление за заказ друга (POST: `order_id`, `order_total`) |
| `r/<код>/?return=` | `referralFrontendLandingController`, публичная ссылка друга |

Бэкенд: `referral/?module=backend&action=account&id=<contact_id>`, `referral/?module=backend&action=adjust` (POST: `contact_id`, `delta`, `reason`).

## Фреймворк

Исходники Webasyst: https://github.com/webasyst/webasyst-framework

## Задание

См. [TASK.md](TASK.md).
