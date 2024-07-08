<?php

function rg_templateScriptSetup() {
    // Register styles in WordPress
    wp_register_style('custom-css', get_stylesheet_directory_uri(). '/style.css');
    wp_enqueue_style( 'custom-css');
}
add_action('wp_enqueue_scripts', 'rg_templateScriptSetup');

function get_prices_api($sku) {
    if(!$sku) {
        wp_redirect(home_url());
        exit();
    }
    
    $url = 'https://next-auth-test-beige.vercel.app/api/products/search';
    $data = array('sku' => $sku);
    
    // Initializes a new cURL session
    $curl = curl_init($url);
    // Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the CURLOPT_POST option to true for POST request
    curl_setopt($curl, CURLOPT_POST, true);
    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    // Set custom headers for RapidAPI Auth and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json'
    ]);
    // Execute cURL request with all previous settings
    $response = json_decode(curl_exec($curl));
    // Close cURL session
    curl_close($curl);
    
    $return = $response->response ? $response->response : $response;
    return $return->rows[0];
}
add_shortcode('prices_api', 'get_prices_api');

function get_products_api() {
    
    $url = 'https://next-auth-test-beige.vercel.app/api/products/list';
  
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    
    $return = $response->response ? $response->response : $response;
    return $return->rows;
}
add_shortcode('prices_api', 'get_products_api');

function findObjectBySku($sku, $array){
    foreach ( $array as $element ) {
        if ( $sku == $element->sku ) {
            return $element;
        }
    }
    return false;
}