# ツール・ライブラリの名前

ReadingAloud

## 簡単な説明

音読APIを使用して小説家になろうを音読アプリです。

## 作成経緯

日本はマンガ大国というイメージが強いですが、現状海外の企業に市場を奪われていっている現状です。
(アニメなどの動画:Netflix 電子書籍:ピッコマなど)

そこで今までにない漫画アプリを作成しようと考え、小説の音読アプリを考えました。

現在でも"Amazonオーディオブック"など音読アプリがありますが、これらのアプリは、プロのナレーターなどが朗読した本を聞けるコンテンツです。

### 既存音読アプリとの差別化
||ReadingAloud|既存音読アプリ|
|---|---|---|
|聴きやすさ|音読APIを利用しているため単調|プロのナレータの朗読のため聴きやすい|
|読み間違い|漢字の読み間違いが発生する|プロのナレータの朗読のため読み間違いはない|
|作品数|ライトノベル数と直結|一つ一つプロに頼んでいるため少ない|

## 機能
- お気に入り機能
- 閲覧履歴
- ランキング


# README

## user
| Column | Type | Options|
| --- | --- | --- |
| username   | string | null: false |
| email                | string | null: false |
| password   | string | null: false |
| password_confirmation| string | null: false |

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

## view_history
| Column  | Type   | Options |
| --- | --- | --- |
| user_id | integer | null: false |


## favorite
| Column  | Type   | Options |
| --- | --- | --- |
| user_id | integer | null: false |