<?php
$options = get_option( 'plugin_database' );
if ($options["fdatadb"] == "" || $options["fdatahost"] == "" || $options["fdatauser"] == ""){
} else {
include_once( plugin_dir_path( __FILE__ ) . "shortcode.php");
}
//start settings page
function plugin_options_page_fetch() {
	
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
 
//get variables outside scope
global $color_scheme;
?>
<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<style type="text/css">
.clear { clear:both;}
#wpdb-fetch {width:50%; clear:both; margin-top:0px; padding:30px; background:#fff; float:left;}
#pro-features {width:20%; background:#283593; float:left; color:#fff;position:relative;}
#pro-features .getpro { background:#000;color:#fff;padding:15px 10px;}
#pro-features .getpro a {color:#fff; text-decoration:none; background:#D54E21;padding:5px 14px; display:inline-block;width:auto;margin-top:5px;}
#pro-features .pro-content{padding:0 10px;}
#pro-features h2 {color:#fff;}
#pro-features li { margin-left:10px;}
#pro-features li a {color:#fff; text-decoration:none;}
#pro-features .ratings { background:#F1F1F1; padding:6px 10px;}
#pro-features .ratings a { display:inline-block; font-size:15px; line-height:24px;}
#wpdb-fetch form {margin-top:15px;}
#wpdb-fetch label { color:#333; font-size:14px; margin-bottom:5px; display:block;}
#wpdb-fetch form input { margin-bottom:10px;}
#wpdb-fetch h2,#wpdb-fetch h4,#wpdb-fetch p{margin:0;padding:0;}
#wpdb-fetch h2 {line-height:35px;}
#wpdb-fetch .output {margin-top:10px;background:#f5f5f5;padding:8px;}
#submit { border:none; background:#000; padding:8px 20px; color:#fff; text-transform:uppercase; font-size:12px;}
#wpdb-fetch small pre{ width:100%; overflow:scroll; display:none; color:#fff; background:#000; padding:5px; height:400px;}
#data-success,#data-error {padding:10px 30px; background:#333; color:#fff; width:50%; margin-top:20px;}
#data-success span {float:left;width:25px;height:25px;background:#00E676;border-radius:50%;}
#data-success strong,#data-error strong {float:left;line-height:25px;margin-left:15px;}
#data-error span {float:left;width:25px;height:25px;background:#D32F2F;border-radius:50%;}
</style>
<?php do_shortcode('[wpdb-pull]'); ?>
<div id="main-wrap">
<div id="wpdb-fetch"> 
<h2><strong>Database Details:</strong></h2>
<h4>Provide correct database details from were you want to fetch content.</h4>
<p><b><small>*Note: Free version will only fetch recent 5 posts content from wp_posts table (i.e - Posts in wordpress).</small></b></p>
<form method="post" action="options.php">
<?php settings_fields( 'plugin_database_get' ); ?>
<?php $options = get_option( 'plugin_database' ); ?>
<label for="plugin_database[fdatadb]"><?php _e( 'Database Name:' ); ?></label>
<input type="text" id="plugin_database[fdatadb]" name="plugin_database[fdatadb]" value="<?php esc_attr_e( $options['fdatadb'] ); ?>"></input>
<label for="plugin_database[fdatauser]"><?php _e( 'Username:' ); ?></label>
<input type="text" id="plugin_database[fdatauser]" name="plugin_database[fdatauser]" value="<?php esc_attr_e( $options['fdatauser'] ); ?>"></input>
<label for="plugin_database[fdatapwd]"><?php _e( 'Password:' ); ?></label>
<input type="text" id="plugin_database[fdatapwd]" name="plugin_database[fdatapwd]" value="<?php esc_attr_e( $options['fdatapwd'] ); ?>"></input>
<label for="plugin_database[fdatahost]"><?php _e( 'Hostname:' ); ?></label>
<input type="text" id="plugin_database[fdatahost]" name="plugin_database[fdatahost]" value="<?php esc_attr_e( $options['fdatahost'] ); ?>"></input>
<p><input name="submit" id="submit" value="Connect" type="submit"></p>
</form>

<div class="output">
<h4>For Output Use Following Shortcode:</h4>
<p>Using Post Or Page:<span style="color:red;"> [wpdb-pull]</span></p>
<p>Using PHP:<span style="color:red;"> &lt;?php echo do_shortcode('[wpdb-pull]'); ?&gt;</span></p>
<br />
<h4>Plugin is also available with widget.</h4>
<p><a href="<?php echo site_url(); ?>/wp-admin/widgets.php">(WP Database Fetch Widget)</a></p>
</div>
</div>
<div id="pro-features">
<div class="ratings">
<a href="https://wordpress.org/support/view/plugin-reviews/wp-database-fetch" target="_blank">Rate us</a><br />
<a href="https://www.facebook.com/CodersSociety/" target="_blank">Like us</a>
</div>
</div>
<div class="clear"></div>
</div>
<?php
}
?>