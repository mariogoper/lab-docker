<?php
function getUserLocation($ip) {
    $url = "http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,query";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    if ($data['status'] == 'success') {
        return [
            'ip' => $data['query'],
            'country' => $data['country'],
            'region' => $data['regionName'],
            'city' => $data['city']
        ];
    } else {
        return null;
    }
}

// Obtener la IP del usuario
$ip = $_SERVER['REMOTE_ADDR'];

// Si la IP es privada (por ejemplo 172.20.0.1), la API no puede ubicarla,
// así que consultamos sin IP y nos devuelve la IP pública
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
    $ip = "";
}

$location = getUserLocation($ip);
if ($location) {
    echo "IP: " . $location['ip'] . "<br>";
    echo "País: " . $location['country'] . "<br>";
    echo "Región: " . $location['region'] . "<br>";
    echo "Ciudad: " . $location['city'] . "<br>";
} else {
    echo "No se pudo determinar la ubicación.";
}
?>
