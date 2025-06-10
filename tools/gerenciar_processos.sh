#!/bin/bash

echo "GenesisMultiLog - Gerenciador de Processos"
echo "1) Monitorar processos"
echo "2) Matar processos"
echo "3) Sair"
read -p "Escolha uma opcao: " opcao

case $opcao in
    1)
        php tools/monitorar_processos.php
        ;;
    2)
        php tools/matar_processos.php
        ;;
    3)
        echo "Saindo..."
        exit 0
        ;;
    *)
        echo "Opcao invalida"
        ;;
esac
