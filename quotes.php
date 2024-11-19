<?php

header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('Strict-Transport-Security: max-age=63072000');
header('Content-Type: application/json');
header('X-Robots-Tag: noindex, nofollow', true);

$quotesUrl = 'quotes.json';

try {
    $jsonData = @file_get_contents($quotesUrl);

    if ($jsonData === false) {
        throw new Exception('Failed to fetch data from the provided URL or file.');
    }

    $data = json_decode($jsonData, true);

    if ($data === null) {
        throw new Exception('Invalid JSON format.');
    }

    if (!isset($data['motivational_quotes']) || !is_array($data['motivational_quotes'])) {
        throw new Exception('No motivational quotes available or incorrect structure.');
    }

    $quotes = $data['motivational_quotes'];
    $randomIndex = array_rand($quotes);
    $randomQuote = $quotes[$randomIndex];

    if (!is_array($randomQuote) || !isset($randomQuote['id']) || !isset($randomQuote['quote'])) {
        throw new Exception('Invalid quote structure.');
    }

    echo json_encode([
        'status' => 'success',
        'quote' => $randomQuote
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}