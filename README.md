# 概要
「monogra」は自分のモノを管理するためのWebアプリケーションです。

「持ち運べる倉庫」をコンセプトに、カテゴリで分類してモノを管理することで自分のモノを整理して把握することを目指します。

__リンク__ : https://monogra.xyz

![demo](https://raw.github.com/wiki/hurugi7/monogra/images/4eabc5c70672295d8d722536be5670a1.gif)

# 制作背景
あるとき、家族から洋服の買い物でこんな失敗があると聞きました。
* 似たような服を買ってしまった。
* 持っている服に似合わないが、そのことを忘れてつい買ってしまった。

これらの失敗はおよそ自分の洋服をきちんと把握できていないことが原因の一つだと考えられます。

しかし、自分の持ち物を正確に把握するのは、このモノがあふれた現代では中々難しいことでもあります。

そこで、アプリケーションを利用して自分の持ち物の情報をどこでも持ち運べるようにすることで、モノの管理ができていないことが原因の失敗をなくせるのではないかと思い、今回このアプリケーションの作成に至りました。

# 使い方
「monogra」ではカテゴリとサブカテゴリを作成し、その下にアイテムを登録します。


__カテゴリ作成__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/category_index.png)

![demo](https://raw.github.com/wiki/hurugi7/monogra/images/category_create.png)

* 右上のボタンからカテゴリを作成します。




__カテゴリ編集、削除__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/category_sub_category_item_edit_place.png)

* カテゴリの右にある三点リーダーから編集と削除ができます。
* 登録されているアイテム数が表示されます。


__サブカテゴリ作成__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/sub_category_index.png)
![demo](https://raw.github.com/wiki/hurugi7/monogra/images/sub_category_create.png)
* カテゴリと同様に作成できます。

__サブカテゴリ編集、削除__


* カテゴリと同様に編集、削除ができます。

__アイテム作成__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/item_index.png)
![demo](https://raw.github.com/wiki/hurugi7/monogra/images/0eec6b0334bdf811b8c59f36d9538abc.gif)


* 右上のボタンからアイテムを作成します。
* アイテム名、アイテム画像（5枚まで）、値段、個数、購入日、購入場所、ノートが登録できます。



__アイテム詳細__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/item_show.png)


* アイテム一覧ページのアイテムをクリックすることでアイテムの詳細が確認できます。



__アイテム編集、削除__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/e7b198aa78dff971011667a85d751734.gif)


* アイテムの右にある三点リーダーからアイテムの編集と削除ができます。


__アイテム画像の削除__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/741f836a498414260ff90586963cf155.gif)


* アイテム画像欄の右上にあるボタンからアイテムを選択して削除できます。


__アイテム検索__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/09d20e611eef1d0f92b277a4d2ce7645.gif)


* 画面上部の検索バーからアイテムの検索ができます。アイテム名の部分一致で検索されます。



__ユーザープロフィール__


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/5a80fb6fa0918790a914fc6da6fd5263.gif)


* 画面上部のハンバーガーメニューからユーザープロフィールの編集画面へいくことができます。
* ログアウトもこの画面から行えます。


# 機能一覧


* カテゴリ作成
* カテゴリ編集
* カテゴリ削除


* サブカテゴリ作成
* サブカテゴリ編集
* サブカテゴリ削除


* アイテム作成
* アイテム編集
* アイテム削除
* アイテム画像削除
* アイテム検索


* ユーザープロフィール編集
* ログイン、ログアウト機能
* ゲストログイン機能
* 新規登録機能
* パスワード再設定機能


# 使用技術


__フロントエンド__


* HTML
* CSS
* Tailwind CSS 3.2.7
* Alpine.js 3.12.0


__バックエンド__


* Laravel 8.83.27
* PHP 7.4.33
* MYSQL 5.7.40

__開発環境__


* Docker 23.0.1 / Docker Compose 1.25.0
  - Appコンテナ
    - PHP
    - Laravel
  - DBコンテナ
    - MYSQL
  - Amazon S3(画像を保存するためのストレージ)



__本番環境__

* AWS: ECS(Fargate), RDS, Route53, ALB, ACM, S3, VPC, IAM, SES


# DB設計


item_photosテーブルを別に作り、itemsテーブルと関連付けることで複数写真の保存と編集を実現しました。

また、ヘッダーにユーザープロフィールのデータを渡すために、categories、sub_categories、itemsテーブルとusersテーブルを関連付けました。


![demo](https://raw.github.com/wiki/hurugi7/monogra/images/ER_diagram.jpg)


# インフラ構成


* ECS（Fargate）を利用し、Webサーバーとアプリケーションサーバーが一つにまとまったコンテナを立てました。
* データベースはRDS、画像保存用の外部ストレージはS3を使用しています。また、Laravelの環境変数ファイルをS3に保存し、参照するようにしています。
* GitHub Actionsを利用し、CI/CDパイプラインを構築しました。
* Laravelの設定で、CloudWatchにログを出力しています。
* メールサーバーにSESを利用し、パスワード再設定メールの送信をしています。


![demo](https://github.com/hurugi7/monogra/blob/master/infra_aws_monogra.drawio.png)


