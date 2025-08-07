<?php
// app/Helpers/supabase_helper.php

function supabase_client() {
    return [
        'url' => getenv('SUPABASE_URL'),
        'key' => getenv('SUPABASE_ANON_KEY')
    ];
}

function supabase_request($endpoint, $method = 'GET', $data = null, $token = null) {
    $client = \Config\Services::curlrequest();
    $supabase = supabase_client();
    
    $options = [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'apikey' => $supabase['key'],
        ],
        'http_errors' => false,
        'timeout' => 30,
        'debug' => ENVIRONMENT === 'development',
        'verbose' => true
    ];
    
    if ($token) {
        $options['headers']['Authorization'] = 'Bearer ' . $token;
    } else {
        $options['headers']['Authorization'] = 'Bearer ' . $supabase['key'];
    }
    
    if ($data && ($method == 'POST' || $method == 'PUT')) {
        $options['json'] = $data;
    }
    
    $url = $supabase['url'] . $endpoint;
    
    try {
        // Lakukan request
        $response = $client->request($method, $url, $options);
        
        // Dapatkan status code
        $statusCode = $response->getStatusCode();
        
        // Dapatkan body response
        $body = $response->getBody();
        $result = json_decode($body, true);
        
        // Log untuk debugging
        log_message('info', "Supabase request to {$url} completed with status {$statusCode}");
        
        // Jika status code menunjukkan error (4xx atau 5xx)
        if ($statusCode >= 400) {
            log_message('error', "Supabase error: Status {$statusCode}, Response: " . $body);
            
            // Jika response adalah JSON yang valid, gunakan pesan error dari response
            if ($result && isset($result['error'])) {
                return [
                    'success' => false, 
                    'error' => $result['error'], 
                    'code' => $statusCode,
                    'details' => $result
                ];
            }
            
            // Jika bukan JSON yang valid atau tidak ada field 'error'
            return [
                'success' => false, 
                'error' => "Error {$statusCode}", 
                'code' => $statusCode
            ];
        }
        
        // Jika response bukan JSON yang valid
        if ($result === null) {
            log_message('error', "Invalid JSON response from Supabase: " . $body);
            return [
                'success' => false, 
                'error' => 'Invalid response format', 
                'code' => $statusCode,
                'raw' => $body
            ];
        }
        
        // Sukses
        return array_merge(['success' => true], $result);
        
    } catch (\Exception $e) {
        // Tangkap exception dari cURL atau JSON parsing
        $errorMessage = $e->getMessage();
        $errorCode = $e->getCode();
        
        log_message('error', "Supabase request exception: {$errorMessage} (Code: {$errorCode})");
        
        return [
            'success' => false, 
            'error' => "Request failed: {$errorMessage}", 
            'code' => $errorCode,
            'exception_type' => get_class($e)
        ];
    }
}