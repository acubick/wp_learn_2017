=== Shipping for Nova Poshta ===
Contributors: bandido
Tags: woocommerce, Shipping for Nova Poshta, нова пошта, новая почта, ecommerce
Requires at least: 4.1
Tested up to: 5.4
Stable tag: 1.7.45
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
WooComerce tested up to: 4.2.2

Плагін 2-в-1: спосіб доставки Нова Пошта та генерація накладних Нова Пошта.

== Description ==

Плагін додає спосіб доставки Нова Пошта до вашого магазину на WooCommerce та можливість створювати накладні з замовлень. Плагін працює по АРІ 2.0 і з’єднується напряму з сервером Нової Пошти. Плагін допомагає автоматизувати процес відправки ваших замовлень через Нову Пошту. На сторінці замовлення можна згенерувати експрес накладну із даних, які вносив покупець при оформленні.


== Video ==
https://youtu.be/u7oGTA9S_U8


== Інструкція ==

1. Встановіть і активуйте плагін.

2. На сторінці налаштувань плагіна, введіть ключ АРІ Нової Пошти

3. Введіть ПІП та номер телефона відправника

4. Введіть відділення, з якого будете проводити відправку (дані повинні підвантажитися з бази, якщо в поле "Відділення" написати просто "1" - накладні створюватися не будуть.



== Підтримка ==

Якщо виникла помилка при встановленні чи використанні плагіна - пишіть на support@morkva.co.ua або на нашу сторінку https://m.me/morkvasite



== Frequently Asked Questions ==

= В якому форматі вводити номер телефону одержувача? =

Вводьте в форматі 380ХХХХХХХ

= Чи потрібно мені вводити дані відправника кожного разу? =

Дані відправника ви вводите один раз.

= Чи потрібно мені вводити дані отримувача кожного разу? =

Ні, плагін використовує дані з форми замовлення.

= Чи рахує плагін вартість доставки? =

Ні, плагін лише формує накладну.

= Чи зберігається номер накладної? =

Так, номер накладної зберігається в примітках.

= Чи можна змінити платника? =

Така можливість (як і багато інших) вже є у Pro версії.

= Чи можна змінити оголошену вартість? =

Така можливість (як і багато інших) вже є у Pro версії.


== Screenshots ==

1. Сторінка створення накладної. Просто допишіть опис. ПІП отримувача повинно бути КИРИЛИЦЕЮ (вимога АРІ Нової Пошти)
2. Після створення накладної, можна роздрукувати її або стікер. Також можна буде відправити клієнту на емейл
3. На сторінці замовлень легко розпізнати, для яких клієнтів ви вже сформували накладні
4. Сторінка налаштувань плагіна
5. Якщо поставили чекбокс "Використовувати зони доставки", спосіб доставки Нова Пошта додається як само, як усі інші
6. Можна не розраховувати вартість доставки на етапі створення замовлення. Просто пропишіть фіксовану вартість "0грн"
7. Пошук міст тепер швидший та точніший
8. На сторінці оформлення можна використовувати лише 2 поля: пошук міста та відділення. Плагін сам приховає зайві стандартні поля

== Що нового? ==

= 1.7.45 =
* [new] додано autocomplete полів Місто і Відділення (Адреса 1) для замовлень створених адміністратором вручну

= 1.7.44 =
* [fix] виправлений виклик implode()

= 1.7.43 =
* [fix] виправлені помилки при доставці за іншою адресою

= 1.7.42 =
* [new] додано розрахунок вартості адресної доставки.

= 1.7.39 =
* [fix] оновлення згідно з оновленим форматом баз відділень НП.

= 1.7.38 =
* [pro] оновлено алгоритм вибору міста отримувача при автоматичній генерації ттн
* [fix] інші виправлення

= 1.7.37 =
* [fix] виправлення помилок пов'язаних з пошуком результатів у списку населених пунктів.


= 1.7.36 =
* [pro] В списку замовлень пошук по замовленням
* [pro] В налаштуваннях плагіну опція "Опис відправлення" додати в перелік тільки артикул+кількість, без назви товари - дуже зручно опрацьовувати замовлення, коли в маркуванні є артикул і кількість
* [new] При оформленні замовлення назва полю "Регіон" замінено на "Область"

= 1.7.34 - 1.7.35 =
* [fix] виправлення помилок.

= 1.7.33 =
* [fix] зменшено кількість запитів до серверів нової пошти при створенні накладної. Використання implode() приведено до стандарту PHP 7.4

= 1.7.32 =
* [pro] оновлення логіки автостворення накладних для адресної доставки.

= 1.7.31 =
* [pro] оновлення логіку контролю дати відправки.

= 1.7.30 =
* [pro] оновлення логіки розрахунку вартості замовлення.

= 1.7.29 =
* [pro] додано автоматизацію по сум замовлення для автоматично створених накладних.

= 1.7.27 - 1.7.28 =
* [fix] виправлення пов'язані із сторіною checkout'.

= 1.7.22 - 1.7.26 =
* [fix] виправлення пов'язані з адресною доставкою.

= 1.7.22 - 1.7.26 =
* [fix] виправлення пов'язані з адресною доставкою.

= 1.7.21 =
* [fix] автооновлення баз винесено у окрему настройку, вимкнену за промовчанням.
період оновлення з 1 дня замінено на 7 днів(якщо увімкнено автооновлення).
* [new] додається deliveryprice мета поле для замовлення
* [new] настройка "Створювати накладні для усіх варіантів доставок"

= 1.7.20 =
* [fix] автооновлення баз винесено у окрему настройку, вимкнену за промовчанням.
період оновлення з 1 дня замінено на 7 днів(якщо увімкнено автооновлення).

= 1.7.17, 1.7.18, 1.7.19 =
* [fix] виправлення щодо адресної доставки
* [fix] автостворення накладних всіх типів відправлень (відділення-відділення, відділення - адреса, адреса- адреса,  адреса-відділення)

= 1.7.16 =
* [fix] виправлення щодо адресної доставки

= 1.7.15 =
* [fix] виправлення помилок

= 1.7.14 =
* [new] фонове оновлення бази при потребі

= 1.7.13 =
* [pro] шорткод посилання у листі працює  для листів, відправлених з середини замовлення
* [pro] ТТН без замовлення у списку всіх ТТН

= 1.7.12 =
* [fix] css виправлення щодо ширини select2
* [pro] php виправлення в коді з планувальником cron
* [new] попередження в адмінпанелі про необхідність синхронізації бази відділень

= 1.7.11 =
* [new] На  сторінці "Про плагін" показується інформація про список відділень та міст у бізі відділень плагіну
* [new] виправлення помилок
* [new] створення відправлення з адреси
* [pro] якщо увімкнена автоматизація від суми в кошику  і сума в кошику більше за вказану в настройці то ціна не показується
* [fix] пункт прийому видачі сприймається російською мовою також

= 1.7.10 =
* [pro] шорткод {LINK] в листі + посилання на сторінці списку замовлень
* [fix] shipping fields доставка за другою адресою select2 працює уже без проблем

= 1.7.9 =
* [new] виправлення помилок

= 1.7.8 =
* [new] створення накладної не для замовлення
* [new] оновлення скриптів для якіснішої роботи при оформенні замовлення

= 1.7 =
Синхронізація індексу версій з PRO версією

= 1.4.3 =
* [new] підтримка зон доставки
* [new] дані отримувача можна коригувати при формуванні замовлення
* [update] оновили механізм пошуку міста та відділення (на сторінці чекаут)
* [update] можна використовувати 2 або 3 поля на сторінці чекаут (місто-відділення або регіон-місто-відділення)
* [fix] покращили інтерфейс плагіна
* [fix] виправлено дрібні помилки
* перевірили сумісність з WooCommerce 3.8.x Та Wordpress 5.3

= 1.1.2 =
* [fix] виправлено помилки

= 1.1.1 =
* [fix] виправлено помилки

= 1.1 =
* [new] підтримка WooCommerce 3.7, плагін тепер включає і способи доставки і створення накладних.
Лише 2 поля на сторінці оформлення (checkout): вибір міста (з пошуком) і вибір відділення (з пошуком)

= 1.0.19 =
* [new] оновлення бічного меню та сторінки створення накладної

= 1.0.18 =
* [fix] виправлено не повну сумісність з woocommerce WooCommerce 3.6.4

= 1.0.17 =
* [fix] Оголошена вартість відправки встановлюється правильно

= 1.0.16 =
* [fix] Користувачу з правами shop manager також тепер можна створювати накладну

= 1.0.15 =
* [fix] виправлено баги
* [new] додано ряд перевірок логіки при створенні накладної
* [new] при неправильному введенні даних в форму, відображається і код і роз'яснення помилки

= 1.0.14 =
* [new] перехід від bootstrap дизайну до wp core дизайну
* [new] додано валідацію ПІБ на кирилицю
* [new] Оптимізація коду

= 1.0.13 =
* [new] додано freemius tracking

= 1.0.12 =
* [new] додано валідацію ПІБ
* [fix] дані отримувача беруться з полів billing

= 1.0.11 =
* [fix] на деяких сайтах місто одержувача завжди створювало як "Авангард"

= 1.0.10 =
* [fix] неправильно створювалася адреса відділення відправника
* [fix] різні дрібні правки
* [new] Налаштування Області, Міста, Відділення тепер повністю беруться з плагіна Shipping for Shipping for Nova Poshta
* Формуємо ранній список бажаючих на Pro версію


= 1.0.8 =
* [fix] неправильно створювалася адреса відділення отримувача
* [new] Номер створеної накладної тепер записується у Нотатки на сторінці редагування замовлення


= 1.0.7 =
* [fix] більше не впливає на роботу стилів всього сайту

= 1.0.5 =
* [fix] не зберігався ключ АРІ
* інші дрібні виправлення
