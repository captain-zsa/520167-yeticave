<?php
function getSumResult( $number ) {
    $result = ceil( $number );
    if ( $result > 1000) {
        $result = number_format( $result, 0, ' ', ' ' ) . ' ₽';
    }
    return $result;
}

function include_template( $name, $data ) {
    $name = 'templates/' . $name;
    $result = '';

    if ( !file_exists( $name ) ) {
        return $result;
    }

    ob_start();
    extract( $data );
    require_once $name;

    $result = ob_get_clean();

    return $result;
}

function getTimeToMidnight() {
    date_default_timezone_set( 'Europe/Moscow' );
    $midnight_date = strtotime( 'tomorrow' );
    $hours = floor( ( $midnight_date - time() ) / 3600 );
    $minutes = floor( ( ( $midnight_date - time() )  % 3600 ) / 60 );
    $minutes = ($minutes == 0) ? ( $minutes . '0') : $minutes;
    return  "$hours : $minutes";
}
?>