<?php
    $is_auth = rand(0, 1);

    $category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

    $items = [
        0 => [
            'title' => '2014 Rossignol District Snowboard',
            'category' => "$category[0]",
            'price' => '10999',
            'url' => 'img/lot-1.jpg'
        ],
        1 => [
            'title' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => "$category[0]",
            'price' => '159999',
            'url' => 'img/lot-2.jpg'
        ],
        2 => [
            'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => "$category[1]",
            'price' => '8000',
            'url' => 'img/lot-3.jpg'
        ],
        3 => [
            'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => "$category[2]",
            'price' => '10999',
            'url' => 'img/lot-4.jpg'
        ],
        4 => [
            'title' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => "$category[3]",
            'price' => '7500',
            'url' => 'img/lot-5.jpg'
        ],
        5 => [
            'title' => 'Маска Oakley Canopy',
            'category' => "$category[5]",
            'price' => '5400',
            'url' => 'img/lot-6.jpg'
        ]
    ];

    require('functions.php');

    $diff_date = getTimeToMidnight();

    $page_content = include_template( 'index.php',
        [ 'category' => $category, 'items' => $items , 'lot_timer' => $diff_date] );

    $layout =  include_template( 'layout.php',
        [ 'content' => $page_content, 'category' => $category, 'title' => 'YetiCave', 'user_name' => 'Юрий', 'user_avatar' => 'img/user.jpg', 'is_auth' => $is_auth ] );

    print($layout);
?>

