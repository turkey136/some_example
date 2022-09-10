## 環境構築

- docker コンテナの構築

```
cd docker-compose
docker-compose build
```

- docker コンテナの起動

```
cd docker-compose
docker-compose up
```

- 今日の YouTube 急上昇の取得

```
cd docker-compose
docker-compose run --rm php php artisan command:scrapingYoutube
```

- storage を公開

```
cd docker-compose
docker-compose run --rm php php artisan storage:link
```
