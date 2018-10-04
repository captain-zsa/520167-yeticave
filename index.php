<?php
    $is_auth = rand(0, 1);

    require('functions.php');

    $diff_date = getTimeToMidnight();

    $con = mysqli_connect( 'localhost', 'root', '', 'yeticave' );

    if( !$con ) {
        print( "Ошибка подключения: " . mysqli_connect_error() );
    } // Выполенние запросов

    mysqli_set_charset( $con, 'utf-8' );

    $sql_get_lots = 'SELECT l.id, l.created_date, l.name, l.description, l.lot_img, l.initial_price, l.date_end, l.step, l.fk_winner_id, l.fk_user_id,  l.fk_category_id, c.category_name \'category\'
        FROM lots AS l
        JOIN categories AS c ON l.fk_category_id = c.id
        WHERE l.date_end > NOW()';

    $sql_get_cat = 'SELECT category_name FROM categories';

    $res_get_lots = mysqli_query( $con, $sql_get_lots );
    if( !$res_get_lots ) {
        $error = mysqli_error( $con );
        print( 'Ошибка MySQL: ' . $error );
    }

    $res_get_cat = mysqli_query( $con, $sql_get_cat );
    if( !$res_get_cat ) {
        $error = mysqli_error( $con );
        print( 'Ошибка MySQL: ' . $error );
    }

    $items = mysqli_fetch_all( $res_get_lots, MYSQLI_ASSOC );
    $category = mysqli_fetch_all( $res_get_cat, MYSQLI_ASSOC );



//    $category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
//
//    $items = [
//        0 => [
//            'title' => '2014 Rossignol District Snowboard',
//            'category' => "$category[0]",
//            'price' => '10999',
//            'url' => 'img/lot-1.jpg'
//        ],
//        1 => [
//            'title' => 'DC Ply Mens 2016/2017 Snowboard',
//            'category' => "$category[0]",
//            'price' => '159999',
//            'url' => 'img/lot-2.jpg'
//        ],
//        2 => [
//            'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
//            'category' => "$category[1]",
//            'price' => '8000',
//            'url' => 'img/lot-3.jpg'
//        ],
//        3 => [
//            'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
//            'category' => "$category[2]",
//            'price' => '10999',
//            'url' => 'img/lot-4.jpg'
//        ],
//        4 => [
//            'title' => 'Куртка для сноуборда DC Mutiny Charocal',
//            'category' => "$category[3]",
//            'price' => '7500',
//            'url' => 'img/lot-5.jpg'
//        ],
//        5 => [
//            'title' => 'Маска Oakley Canopy',
//            'category' => "$category[5]",
//            'price' => '5400',
//            'url' => 'img/lot-6.jpg'
//        ]
//    ];

    $page_content = include_template( 'index.php',
        [ 'category' => $category, 'items' => $items , 'lot_timer' => $diff_date] );

    $layout =  include_template( 'layout.php',
        [ 'content' => $page_content, 'category' => $category, 'title' => 'YetiCave', 'user_name' => 'Юрий', 'user_avatar' => 'img/user.jpg', 'is_auth' => $is_auth ] );

    print($layout);
?>

