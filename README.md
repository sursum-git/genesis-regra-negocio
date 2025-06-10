# Wiki Interativa - genesis-regra-negocio

Esta pasta contém os arquivos da wiki interativa. Para publicar via GitHub Pages:

1. Crie o branch `gh-pages` no seu repositório:
```bash
git checkout --orphan gh-pages
```

2. Copie os arquivos desta pasta para o repositório:
```bash
cp -r * /caminho/do/repositorio
cd /caminho/do/repositorio
git add .
git commit -m "Publica wiki interativa"
git push origin gh-pages
```

3. No GitHub, vá em **Settings > Pages** e selecione o branch `gh-pages` como fonte da documentação.

A wiki estará disponível em:
https://sursum-git.github.io/genesis-regra-negocio
