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

?>
<!DOCTYPE html>
<html>
<head>
    
    <title> Password Generator</title>
</head>
<body>
<form method="post">
    <label for="length">Panjang Password:</label>
    <input type="number" name="length" id="length" min="4" max="20" required>
    <br>
    <label for="combination">Jenis Kombinasi:</label>
    <select name="combination" id="combination">
        <option value="huruf">Huruf aja</option>
        <option value="angka">Angka aja</option>
        <option value="kombinasi">Kombinasi huruf dan angka</option>
    </select>
    <br>
    <button type="submit">Buat Password</button>
</form>
</body>
</html>
