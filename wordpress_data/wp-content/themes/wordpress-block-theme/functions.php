<?php
/**
 * ブロックテーマの機能設定
 */

if ( ! function_exists( 'figma_block_theme_setup' ) ) {
    /**
     * テーマのセットアップ
     */
    function figma_block_theme_setup() {
        // エディター関連の機能を有効化
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'automatic-feed-links' );
        
        // ブロックエディタ関連のサポートを明示的に有効化
        add_theme_support( 'editor-styles' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_editor_style( 'style.css' );
        
        // コンテンツ編集のサポート（重要）
        add_post_type_support( 'page', 'editor' );
        add_post_type_support( 'post', 'editor' );
        
        // HTML5マークアップをサポート
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            )
        );
    }
}
add_action( 'after_setup_theme', 'figma_block_theme_setup' );

/**
 * フォントをプリロード
 */
function figma_block_theme_preload_webfonts() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action( 'wp_head', 'figma_block_theme_preload_webfonts', 1 );

/**
 * スクリプトとスタイルの読み込み
 */
function figma_block_theme_scripts() {
    // テーマのスタイルシートを読み込み
    wp_enqueue_style(
        'figma-block-theme-style',
        get_stylesheet_uri(),
        array(),
        filemtime( get_theme_file_path( 'style.css' ) )
    );
}
add_action( 'wp_enqueue_scripts', 'figma_block_theme_scripts' );

/**
 * エディターの公開ボタンなどの表示を確実にする
 */
function figma_block_theme_enable_publication() {
    // 投稿タイプをループして確認
    $post_types = get_post_types( array( 'public' => true ), 'names' );
    foreach ( $post_types as $post_type ) {
        // 各投稿タイプに対してエディターサポートを有効化
        add_post_type_support( $post_type, 'editor' );
    }
    
    // 管理バーを強制的に表示
    show_admin_bar( true );
}
add_action( 'init', 'figma_block_theme_enable_publication' );

/**
 * ブロックエディターの設定追加
 */
function figma_block_theme_editor_settings() {
    // エディターのインライン・スタイルを追加
    add_theme_support( 'editor-styles' );
    
    // ブロックエディターの管理パネルに特定のスタイルを追加
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'figma_block_theme_editor_settings' );

/**
 * ブロックパターンカテゴリーの登録（オプション）
 */
function figma_block_theme_register_pattern_categories() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'figma-layouts',
            array( 'label' => __( 'Figmaレイアウト', 'figma-block-theme' ) )
        );
    }
}
add_action( 'init', 'figma_block_theme_register_pattern_categories' );
