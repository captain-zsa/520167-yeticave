INSERT INTO `categories` (`id`, `category_name`) VALUES
(3, 'Ботинки'),
(1, 'Доски и лыжи'),
(5, 'Инструменты'),
(2, 'Крепления'),
(4, 'Одежда'),
(6, 'Разное');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `contacts`, `created_date`) VALUES
(1, 'Test 1', 'test1@gmail.com', 'pwd1', 'img/avatar.jpg', '', '2018-10-04 17:45:34'),
(2, 'Test 2', 'test2@gmail.com', 'pwd2', 'img/avatar.jpg', '', '2018-10-04 17:45:34');

INSERT INTO `lots` (`id`, `created_date`, `name`, `description`, `lot_img`, `initial_price`, `date_end`, `step`, `fk_winner_id`, `fk_user_id`, `fk_category_id`) VALUES
(1, '2018-10-04 17:54:41', '2014 Rossignol District Snowboard', 'Описание', 'img/lot-1.jpg', 10999, '2018-10-15', 100, NULL, 1, 1),
(2, '2018-10-04 17:54:41', 'DC Ply Mens 2016/2017 Snowboard', 'Описание', 'img/lot-2.jpg', 159999, '2018-10-17', 300, NULL, 2, 1),
(3, '2018-10-04 17:54:41', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Описание', 'img/lot-3.jpg', 8000, '2018-10-13', 100, NULL, 1, 2),
(4, '2018-10-04 17:54:41', 'Ботинки для сноуборда DC Mutiny Charocal', 'Описание', 'img/lot-4.jpg', 10999, '2018-10-14', 200, NULL, 2, 3),
(5, '2018-10-04 17:54:41', 'Куртка для сноуборда DC Mutiny Charocal', 'Описание', 'img/lot-5.jpg', 7500, '2018-10-15', 100, NULL, 2, 4),
(6, '2018-10-04 17:54:41', 'Маска Oakley Canopy', 'Описание', 'img/lot-6.jpg', 5400, '2018-10-17', 50, NULL, 1, 6);

INSERT INTO `bets` (`id`, `created_at`, `bet_amount`, `user_id`, `lot_id`) VALUES
(1, '2018-09-25 12:15:00', 8100, 1, 3),
(2, '2018-09-25 12:51:30', 8500, 2, 3);

-- Получаем все категории
SELECT * FROM categories;

-- Получаем самые новые, открытые лоты. Каждый лот включает название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;
SELECT
    l.name, -- название лота
    l.initial_price,  -- стартовую цена лота
    l.lot_img, -- ссылку на изображение лота
    c.category_name AS category_name, -- название категории
    (SELECT MAX(b.bet_amount) FROM bets AS b WHERE l.id = b.lot_id) AS max_price, -- максимальная цена за лот
    (SELECT COUNT(1) FROM bets AS b WHERE l.id = b.lot_id GROUP BY b.lot_id) AS bets_count -- количество ставок
FROM
    lots AS l -- выбираем из таблицы lots (псевдоним: l)
LEFT JOIN
    categories AS c
    ON c.id = l.fk_category_id -- присоединяем к таблице lots таблицу categories, чтобы достать название категории по ее ID
LEFT JOIN
    bets AS b
    ON b.lot_id = l.id -- присоединяем к таблице lots таблицу bets
WHERE
    l.date_end > NOW() -- выбираем только открытые лоты
GROUP BY
    l.id -- группируем весь результат по ID лота (из-за join'ов и внутренних запросов имеем несколько одинаковых записей, поэтому и группируем их в одну запись)
ORDER BY
    l.created_date DESC; -- сортируем от новых к старым

 -- Получаем лот по его ID. Получаем также название категории, к которой принадлежит лот
SELECT
    l.id,
    l.name,
    c.category_name AS category_name
FROM
    lots AS l
JOIN
    categories AS c
    ON l.fk_category_id = c.id -- присоединяем таблицу категорий, чтобы достать название категории по ее ID
WHERE
    l.id = 1;

 -- Обновляем название лота по его идентификатору
UPDATE lots SET name = '2014 Rossignol District Snowboard NEW' WHERE id = 1;

 -- Получаем список самых свежих ставок для лота по его идентификатору
SELECT * FROM bets WHERE lot_id = 3 ORDER BY created_at DESC;