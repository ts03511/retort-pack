# retort-pack
- ごくシンプルなWebアプリケーションです。
- 作者自身がどちらかというとシステム基盤寄りの技術者（いわゆるインフラエンジニア）であり、PHPやSQLの学習を目的として開発しています。
- セキュリティは考慮されていません。作者自身もこのプログラムは自宅LAN内のサーバ上でのみ稼働させています。
- 決してインターネット公開しないでください。

## セットアップ方法
`tools/` ディレクトリ配下の下記のスクリプト・SQLを実行してください。

- 01_initialize_retort-pack.sh
- 02_retort.dump
- 03_initialize.sql

手順
- `cd tools/`
- `./01_initialize_retort-pack.sh`
- `mysql -u root -p`
- `create database retort;`
- `mysql -u [user_name] -p retort < 02_retort.dump`
- `mysql -u [user_name] -p retort < 03_initialize.sql`

ちなみにこれまだちゃんと動作検証していないので、完璧ではない可能性があります。。

---

# retort-pack
- this is simple web application series.
- my purpose is studing PHP and SQL.
- no security consideration. MUST NOT publish on Internet.

## How to initialize
exec below scrips in `tools/`

- 01_initialize_retort-pack.sh
- 02_retort.dump
- 03_initialize.sql

operations
- `cd tools/`
- `./01_initialize_retort-pack.sh`
- `mysql -u root -p`
- `create database retort;`
- `mysql -u [user_name] -p retort < 02_retort.dump`
- `mysql -u [user_name] -p retort < 03_initialize.sql`
