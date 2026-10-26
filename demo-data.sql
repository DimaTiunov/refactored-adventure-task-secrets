-- Тестовые данные. Контакты 1, 2 и 3 — клиенты. Коды сделаны md5 от времени, как в коде приложения.

INSERT INTO referral_account (contact_id, code, balance, notify_url) VALUES
(1, 'c4ca4238', 150.50, ''),
(2, 'c81e728d', 0.00, 'http://127.0.0.1:8080/internal/health'),
(3, '', 20.00, '');

INSERT INTO referral_invite (id, referrer_id, email, message, status, internal_note, create_datetime) VALUES
(1, 1, 'friend1@example.com', 'Привет! Заходи по ссылке.', 'sent', 'Друг сотрудника, дать бонус вручную', NOW()),
(2, 2, 'friend2@example.com', '<img src=x onerror="alert(document.cookie)">', 'sent', 'Подозрение на накрутку', NOW());

INSERT INTO referral_bonus (id, contact_id, amount, reason, order_id, create_datetime) VALUES
(1, 1, 150.50, 'referral', 5001, NOW()),
(2, 3, 20.00, 'referral', 5002, NOW());
