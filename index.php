<?php
    $is_auth = rand(0, 1);

    $user_name = 'Юрий'; // укажите здесь ваше имя
    $user_avatar = 'img/user.jpg';

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

    $page_content = include_template( 'templates/index.php',
        [ 'lots' => $category, 'promoItems' => $items ] );

    $layout =  include_template( 'templates/layout.php',
        [ 'content' => $page_content, 'title' => 'YetiCave' ] );

    print($layout);
?>

