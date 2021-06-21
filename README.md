# ツール・ライブラリの名前

ReadingAloud

## 簡単な説明

音読APIを使用して小説家になろうを音読アプリです。

## 作成経緯

日本は漫画大国というイメージが強いですが、現状海外の企業に市場を奪われていっている現状です。
(アニメなどの動画:Netflix 電子書籍:ピッコマなど)
　そこで、まだ市場規模が少ないところは何かと考え音声コンテンツに辿り着きました。
　そして、現在の漫画化やアニメ化に至る主なきっかけのライトノベルの音読アプリを作成しようという経緯に辿り着きました。
　現在でも"Amazonオーディオブック"など音読アプリがありますが、これらのアプリは、主に

web版ライトノベル⇨ライトノベル(書籍)⇨コミック⇨アニメ化決定(音読アプリ化)

とアニメのキャラクター（主に主人公）を担当する声優が、ナレーションをする形でした。
なので、作成するまでにハードルが高く、作品数も少ないのが現状です。
　作成したアプリは、web版ライトノベルを投稿するだけで、音読アプリを作成するというものです。

### 既存音読アプリとの差別化
||ReadingAloud|既存音読アプリ|
|---|---|---|
|作品数|ライトノベル数と直結|一つ一つプロに頼んでいるため少ない|
|言語|多言語に対応|ナレーションを担当した国のみ|
|速度|0.5倍〜2倍速まで対応|基本一定の速度のみ|
|価格|基本無料|基本月額¥1,000以上でサブスクリプションや一冊¥2,000以上で購入|

## 機能
- お気に入り機能
- 閲覧履歴
- ランキング


# README

## user
| Column | Type | Options|
| --- | --- | --- |
| name   | string | null: false |
| email | string | null: false |
| password   | string | null: false |

## book
| Column  | Type   | Options |
| --- | --- | --- |
|title|string|null: false|
|author|string|null: false|
|letter_body|string|null: false|
| category_id | integer | null: false |

## category
| Column  | Type   | Options |
| --- | --- | --- |
| book_id | integer | null: false |
|category|string|null: false|

## category_book
| Column  | Type   | Options |
| --- | --- | --- |
| book_id | integer | null: false |
| category_id | integer | null: false |

## user_book
| Column  | Type   | Options |
| --- | --- | --- |
| user_id | integer | null: false |
| book_id | integer | null: false |

