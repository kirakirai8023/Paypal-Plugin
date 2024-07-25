<?php
// 加载当前的 PayPal 配置
$config = include('config.php');

// 如果收到 POST 请求，则更新配置
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config['client_id'] = $_POST['client_id'] ?? $config['client_id'];
    $config['client_secret'] = $_POST['client_secret'] ?? $config['client_secret'];
    $config['sandbox'] = isset($_POST['sandbox']) ? (bool)$_POST['sandbox'] : $config['sandbox'];

    // 将新的配置保存回文件
    file_put_contents('config.php', "<?php\nreturn " . var_export($config, true) . ";\n");
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>PayPal 配置</title>
</head>
<body>
    <h1>PayPal 配置</h1>
    <form method="post">
        <label for="client_id">PayPal Client ID:</label><br>
        <input type="text" id="client_id" name="client_id" value="<?php echo htmlspecialchars($config['client_id']); ?>"><br><br>

        <label for="client_secret">PayPal Client Secret:</label><br>
        <input type="text" id="client_secret" name="client_secret" value="<?php echo htmlspecialchars($config['client_secret']); ?>"><br><br>

        <label for="sandbox">使用沙盒环境:</label>
        <input type="checkbox" id="sandbox" name="sandbox" <?php if ($config['sandbox']) echo 'checked'; ?>><br><br>

        <input type="submit" value="保存">
    </form>
</body>
</html>
