 <?php

function generate_password($length, $combination) {
    $chars = '';
    switch ($combination) {
        case 'huruf':
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'angka':
            $chars = '0123456789';
            break;
        case 'kombinasi':
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
        default:
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
    }
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $password;
}
if (isset($_POST['length']) && isset($_POST['combination'])) {
    $length = intval($_POST['length']);
    $combination = $_POST['combination'];
    if ($length < 4 || $length > 20) {
        echo "Panjang password harus antara 4 dan 20 karakter.";
    } else {
        $password = generate_password($length, $combination);
        echo "Password acak: " . $password;
    }
}
