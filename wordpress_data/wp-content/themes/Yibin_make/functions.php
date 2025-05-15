<?php
/**
 * ブロックテーマ用の関数
 */

if ( ! function_exists( 'wordpress_block_theme_setup' ) ) {
    /**
     * テーマのセットアップ
     */
    function wordpress_block_theme_setup() {
        // エディタースタイルサポート
        add_theme_support( 'editor-styles' );
        
        // ブロックスタイルをテーマに登録
        add_theme_support( 'wp-block-styles' );
        
        // リンクされたブロックの編集を可能にする
        add_theme_support( 'link-templates-editor' );
    }
}
add_action( 'after_setup_theme', 'wordpress_block_theme_setup' );

/**
 * テーマのスタイルとスクリプトの登録
 */
function wordpress_block_theme_styles() {
    // テーマのスタイルシートを登録・読み込み
    wp_enqueue_style( 
        'wordpress-block-theme-style', 
        get_stylesheet_uri(), 
        array(),
        filemtime( get_theme_file_path( 'style.css' ) )
    );
}
add_action( 'wp_enqueue_scripts', 'wordpress_block_theme_styles' );

/**
 * ブロックパターンカテゴリーの登録（オプション）
 */
function wordpress_block_theme_register_pattern_categories() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'custom-layouts',
            array( 'label' => __( 'カスタムレイアウト', 'wordpress-block-theme' ) )
        );
    }
}
add_action( 'init', 'wordpress_block_theme_register_pattern_categories' );
