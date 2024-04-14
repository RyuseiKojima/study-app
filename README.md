最終更新日：2024/4/14

1. アプリ概要

○タイトル<br>
Tech Sharing

○アプリリンク<br>
https://technoshared.com

○デモアカウント<br>
アドレス：demo@gmail.com<br>
パスワード：password

○概要<br>
プログラミング記事のクリップアプリです。<br>
プログラミング学習中に参考にしたウェブサイトをメモ付きでクリップするアプリとして使用します。<br>
クリップのいいね機能や、ユーザー同士のフォロー機能を実装しました。<br>
クリップされている投稿については、あるユーザの投稿、いいねした投稿など数種類の条件付きで確認できます。

○アプリを作った目的<br>
プログラミング記事のクリップ機能を通して、ユーザーの学習効率アップ<br>
いいね機能やフォロー機能を通して、ユーザーの情報収集を促進<br>
ユーザーの投稿やいいね履歴を元におすすめの投稿を提示し、ユーザーのスキルアップに貢献

○力を入れた技術的要素<br>
いいね機能やフォロー機能を実装するにあたり、中間テーブルを作成しました。<br>
多対多のリレーションについては開発開始時点で未習得だったので、いくつかの記事を参考にしながら構築を進めました。

2. アプリ機能

○E-R図<br>
![study-app-er drawio](https://github.com/RyuseiKojima/study-app/assets/122793737/e67bc614-7b6b-4f77-b9da-5c50a2ae2658)

○実装済み機能<br>
・投稿作成（CRUD）<br>
投稿作成時、該当サイト（単一選択）とカテゴリ（複数選択）を選択する仕様となっています。<br>
自身の投稿は編集削除、他ユーザの投稿は詳細確認ができます。<br>
投稿はあるユーザの投稿、いいねした投稿など数種類の条件付きで閲覧できます。

・クリップのいいね機能<br>
用意されたいいねボタンをクリックすると、ボタンの色とカウント数が変化します。<br>
いいねした記事をまとめて閲覧できるようにタブを用意しました。

・クリップの検索機能<br>
ナビゲーションバーにキーワードを入れて検索すると、それが含まれる記事一覧が表示されます。<br>
空欄のままで検索ボタンを押すと、ホーム画面にリダイレクトされます。

・ユーザーのフォロー機能<br>
ユーザー名横のフォローボタンをクリックすると、ボタンの色が変化し、対象ユーザーをフォローした状態となります。<br>
フォローしたユーザーの記事をまとめて閲覧できるようにタブを用意しました。

・会員登録 / ログイン / ログアウト（CRUD）<br>
※認証機能についてはLaravelにデフォルトで用意されたものを踏襲しました。<br>

・プロフィール画面<br>
テーブルのユーザ名をクリックすると、そのユーザのプロフィール画面に遷移します。<br>
ユーザの投稿一覧、いいね一覧、フォロワー情報を確認できます。<br>
自身のプロフィール画面には情報更新ボタン、他ユーザのものにはフォローボタンを用意しています。<br>
※認証機能についてはLaravelにデフォルトで用意されたものを踏襲しました。

○実装予定の機能<br>
・ユーザーごとにおすすめ記事を表示<br>
・いいね数やクリップ数などのランキング表示<br>
・プロフィール画面の拡充（アイコンなど）<br>
・各テーブルを編集できる管理者画面を作成

3. 使用技術

○フロントエンド<br>
・HTML<br>
・CSS<br>
・Bootstrap 5.2.3<br>
・Vite 4.5.1<br>

○バックエンド<br>
・PHP 8.3.3<br>
・Laravel 9.52.16<br>
・MySQL 8.3.0<br>
・composer 2.2.22<br>

PHP / Laravelの選定理由は、最初に利用したプログラミング教室で扱われた言語だったこと、普及率が高く学習する際に情報を集めやすいこと、求人数が比較的多いことなどを踏まえて選びました。<br>
今後、RailsやGo, Javaの記述方法も勉強したいと考えています。

○インフラ<br>
VSCode<br>
Git / GitHub<br>
AWS<br>
Docker 4.28.0<br>
macOS sonoma 14.4<br>

本番環境のデプロイ先にAWSを選定した理由は、インフラ周りの基本的な知識を身につけたかったためです。

4. 開発過程（予定含む）

○1月中旬〜<br>
Docker上でlaravelの開発環境を構築し、記事のCRUD機能を実装しました。<br>
この段階ではカテゴリの複数選択はできない状態でした。<br>

○2月上旬〜<br>
AWSでのデプロイを実施しました。<br>
インフラ周りに関する知識をほとんど持っていなかったため、3週間程度かけて完了しました。<br>
ルータやサブネットなど、各要素の位置関係や役割を学びながら少しずつ設計を進め、最終的に以下の図の形に落ち着きました。<br>
特に時間がかかったのは、http通信のSSL化です。<br>

![study-app-net drawio](https://github.com/RyuseiKojima/study-app/assets/122793737/059f94ff-54b4-4091-af01-452559b3585e)

○2月下旬〜<br>
基本機能の拡充を継続中です。<br>
これまでは、多対多リレーションの導入に特に時間をかけて取り組みました。<br>
主な実装内容は2の「実装済み機能」に示したものです。<br>

○第三者からのフィードバック<br>
作成過程で現役エンジニアと定期的な面談を実施し、以下のアドバイスを受けてリファクタリングなど施しました。<br>
・Modelに同様の呼び出し処理が複数用意されており、データ数が増えた時に重くなることが懸念される(Clip)<br>
→繰り返し使用する処理を切り分け(getClipsBuilder)、各条件ごとの関数に使用しました。<br>

![image](https://github.com/RyuseiKojima/study-app/assets/122793737/8e0a327b-534f-4d20-a264-619aba642cb9)

・Controllerをスリムにして可読性を向上すべき<br>
→Modelの呼び出しと最低限の変数のみを記述する形に変えました。<br>
変更前<br>
<img width="1019" alt="HomeController変更前" src="https://github.com/RyuseiKojima/study-app/assets/122793737/c2041d2f-3340-4038-9c76-ef2247911668">
変更後<br>
<img width="553" alt="image" src="https://github.com/RyuseiKojima/study-app/assets/122793737/ccac11f9-8f53-48d3-a3aa-3eb935d4c434">

・Viewで繰り返し書かれている要素が多く、管理が煩雑になる<br>
→変数付きのincludeを使用し、編集すべきファイルを画一化しました。<br>
変更前<br>
全ての投稿、いいねした投稿など、項目ごとにファイルを作っていたため重複箇所が多かった<br>
![image](https://github.com/RyuseiKojima/study-app/assets/122793737/1eb0886c-3c35-43f9-be49-d6093a5dd459)
変更後<br>
ベースのファイルを用意し、変数を当てる事で各条件の投稿一覧を表示できるように修正<br>
<img width="861" alt="image" src="https://github.com/RyuseiKojima/study-app/assets/122793737/41710c7a-bb5a-465a-9fb9-191a36809e9d"><br>
<img width="422" alt="image" src="https://github.com/RyuseiKojima/study-app/assets/122793737/b999c3b8-3dad-48da-bd75-918c9274c5d0">

○今後の予定<br>
・機能の拡張<br>
2に示した「実装予定の機能」などの作成を進め、アプリの利便性を高めたいです。<br>
特に、「ユーザーごとにおすすめ記事を表示」する機能は、アプリの作成目的を達成するための重要な要素として、力を入れて取り組みたいと考えています。<br>
具体的には、ユーザーの投稿頻度が高いカテゴリやフレーズを集計し、一致する人気記事を表示するメソッドを実装予定です。<br>

・テストの実装<br>
予期せぬバグを避けるためにも、テストの用意は不可欠であると考えているので、機能の拡張がある程度進んだ段階でテストの実装に取り組みたいです。<br>
