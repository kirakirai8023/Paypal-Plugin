<?php
// 加载 PayPal 配置
$config = include('config.php');

// 从配置中获取 PayPal 凭据
$clientId = $config['client_id'];
$clientSecret = $config['client_secret'];
$sandbox = $config['sandbox'];

// 设置 PayPal API 的基础 URL，根据环境选择使用沙盒或生产环境
$paypalUrl = $sandbox ? "https://api.sandbox.paypal.com" : "https://api.paypal.com";

/**
 * 创建 PayPal 支付请求
 * 
 * @param float $amount 支付金额
 * @param string $currency 货币代码（例如 USD）
 * @param string $description 交易描述
 * @return array|false 返回 PayPal API 的响应数据，或在出错时返回 false
 */
function createPayment($amount, $currency, $description) {
    global $paypalUrl, $clientId, $clientSecret;

    // 初始化 cURL 请求
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$paypalUrl/v1/payments/payment");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Basic " . base64_encode("$clientId:$clientSecret")
    ]);

    // 设置支付请求的数据
    $data = [
        "intent" => "sale",
        "payer" => [
            "payment_method" => "paypal"
        ],
        "transactions" => [[
            "amount" => [
                "total" => $amount,
                "currency" => $currency
            ],
            "description" => $description
        ]],
        "redirect_urls" => [
            "return_url" => "http://yourdomain.com/execute_payment.php", // 成功支付后的回调 URL
            "cancel_url" => "http://yourdomain.com/cancel_payment.php"   // 取消支付后的回调 URL
        ]
    ];

    // 将数据编码为 JSON 并附加到请求中
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // 执行请求并获取响应
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 检查是否有错误
    if ($err) {
        echo "cURL Error: $err";
        return false;
    } else {
        return json_decode($response, true);
    }
}
