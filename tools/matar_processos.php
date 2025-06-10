<?php
$dir = __DIR__ . '/../tmp/pids/';
if (!is_dir($dir)) {
    echo "Diretorio de PIDs nao encontrado.\n";
    exit;
}

foreach (glob($dir . '*.pid') as $pidFile) {
    $pid = (int) file_get_contents($pidFile);
    $nome = basename($pidFile);
    if (posix_kill($pid, SIGTERM)) {
        echo "[Encerrado] {$nome} (PID: {$pid})\n";
        unlink($pidFile);
    } else {
        echo "[Erro] Falha ao encerrar {$nome} (PID: {$pid})\n";
    }
}
