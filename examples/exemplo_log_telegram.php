<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Logging\TelegramHandler;

// Substitua pelos seus dados reais
$telegramToken = 'SEU_TOKEN_AQUI';
$chatId = 'SEU_CHAT_ID_AQUI';

$logger = new Logger('exemplo_telegram');
$logger->pushHandler(new TelegramHandler($telegramToken, $chatId));

$logger->info("Mensagem de INFO (nao sera enviada para o Telegram)");
$logger->error("🚨 ERRO capturado e enviado para o Telegram!");
