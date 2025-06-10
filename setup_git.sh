#!/bin/bash
echo "Configurando projeto GenesisMultiLog..."

# Iniciar repositório Git
git init
git add .
git commit -m "Versão inicial da GenesisMultiLog com documentação, testes e exemplos"
git branch -M main

# Solicitar URL do repositório remoto
echo "Digite a URL do repositório remoto no GitHub (ex: https://github.com/usuario/genesisMultiLog.git):"
read repo_url

if [ -z "$repo_url" ]; then
  echo "URL inválida. Abortando push remoto."
  exit 1
fi

git remote add origin "$repo_url"
git push -u origin main

echo "Repositório criado e enviado com sucesso!"
