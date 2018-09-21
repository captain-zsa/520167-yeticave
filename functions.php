<?php function getSumResult( $number ) {
    $result = ceil( $number );
    if ( $result > 1000) {
        $result = number_format( $result, 0, ' ', ' ' ) . ' ₽';
    }
    return $result;
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require_once $name;

    $result = ob_get_clean();

    return $result;
}
?>