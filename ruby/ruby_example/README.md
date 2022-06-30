# 前提

- docker compose コマンドが使えるように環境構築済み

# コンテナの起動 & コンテナに入る

```bash
docker compose up
#=>
・・・省略・・・
⠿ Container ruby-example-ruby-1  Created                                                                                 5.0s
Attaching to ruby-example-ruby-1

docker-compose exec ruby sh
#=>
# ruby -v
ruby 3.1.2p20 (2022-04-12 revision 4491bb740a) [x86_64-linux]
```

# Gem のインストール

```bash
cd /usr/src
bundle install
```

# コマンドの実行

```bash
cd /usr/src
ruby src/puts.rb
#=> test
```
