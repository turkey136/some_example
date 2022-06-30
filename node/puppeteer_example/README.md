# 環境構築

## ライブラリ

- Moca

## Docker コンテナ 構築

```bash
docker compose run build
```

## 起動

```
docker compose run --rm  tests npm test
# =>
Started HeadlessChrome/103.0.5058.0
  View
    ✔ renders Top Page (27524ms)


  1 passing (28s)
```
