<?php
/**
 * @package I'm Makoto Inagaki
 * @version 1.0
 */
/*
Plugin Name: i-am-mine
Plugin URI: http://wordpress.org/plugins/i-am-mine/
Description: My name is M.Ine. This is not just a plugin, it is my profile.
Author: Makoto Inagaki
Version: 1.0
Author URI: http://www.mine.jp/
*/

function hello_mine_get_lyric() {
	/** These are my profile */
	$lyrics = "I am mineです
プログインHello Dolly
いつも速攻削除していてすみません
ホント申し訳ないという事に気付きました
dollyの替え歌で自己紹介します
西武池袋線の中村橋
わたしの住んでいる街
池袋から各駅で５駅目
来週アド街で紹介されます
練馬の青山と呼ばれているらしいです。
大ウソもいいところです
でも一度遊びに来てくさい
Mine'll never go away
Mine'll never go away
Mine'll never go away again";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_mine() {
	$chosen = hello_mine_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_mine' );

// We need some CSS to position the paragraph
function mine_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'mine_css' );

?>
