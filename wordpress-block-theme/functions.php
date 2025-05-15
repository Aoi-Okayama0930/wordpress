<?php
/**
 * ブロックテーマの機能設定
 */

if ( ! function_exists( 'figma_block_theme_setup' ) ) {
    /**
     * テーマのセットアップ
     */
    function figma_block_theme_setup() {
        // ブロックベースのテーマをサポート
        add_theme_support( 'wp-block-styles' );
        
        // エディタースタイルをサポート
        add_theme_support( 'editor-styles' );
        
        // カスタムエディタースタイルを追加
        add_editor_style( 'style.css' );
        
        // ウィジェットブロックエディターのスタイルを追加
        add_theme_support( 'widgets-block-editor' );
        
        // アイキャッチ画像をサポート
        add_theme_support( 'post-thumbnails' );
        
        // タイトルタグの自動出力をサポート
        add_theme_support( 'title-tag' );
        
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
