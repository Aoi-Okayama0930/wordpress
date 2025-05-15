# WordPressプロジェクト

このリポジトリはDockerを使用したWordPress開発環境を含みます。

# themeファイルをアップロードする方法
/wordpress_date/wp-content/themesのファイル下に自分のテーマファイルをアップロードする。

## アクセス方法

- **WordPress**: http://localhost:8080
  - WordPressの管理画面: http://localhost:8080/wp-admin/
  - **管理者ログイン情報**:
    - ユーザー名: admin
    - パスワード: password
    - メールアドレス: admin@example.com
- **データベース**: localhost:3306
  - データベース名: wordpress
  - ユーザー名: user
  - パスワード: password
  - ルートパスワード: rootpassword

## ディレクトリ構造

- `wordpress_data/`: WordPressのコアファイル
  - `wp-content/themes/wordpress-theme/`: カスタムテーマのディレクトリ
- `db_data/`: MySQLのデータベースファイル
- `wordpress-theme/`: テーマのソースファイル（開発用）

## テーマについて

このプロジェクトには以下のファイルを含むカスタムテーマが含まれています:
- `footer.php`: フッターセクション
- `front-page.php`: トップページのテンプレート
- `functions.php`: テーマの機能とカスタマイズ
- `header.php`: ヘッダーセクション
- `index.php`: メインのテンプレートファイル
- `style.css`: テーマのスタイルシート
- `screenshot.png`: テーマのスクリーンショット

## Dockerコンテナ操作方法

### コンテナの起動
```
docker compose up -d
```

### コンテナの停止
```
docker compose down
```

### ログの表示
```
docker compose logs
```

> 注意: コンテナは自動起動しない設定になっています（restart: no）。
> システムを使用する際は、手動でコンテナを起動する必要があります。

## 初期セットアップ

初めてWordPressにアクセスする場合、以下の手順でセットアップを行ってください:

1. `docker compose up -d` コマンドでコンテナを起動
2. ブラウザで http://localhost:8080 にアクセス
3. 言語選択後、サイト情報とログインアカウントを設定
   - 上記の管理者ログイン情報を使用することを推奨（任意の情報に変更可能）
4. インストール完了後、管理画面からテーマを「wordpress-theme」に変更