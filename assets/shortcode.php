<?php
// database connection
function data_connection_admin() {
$options = get_option( 'plugin_database' );
$database = $options["fdatadb"];
$username = $options["fdatauser"];
$password = $options["fdatapwd"];
$hostname = $options["fdatahost"]; 
$dbhandle = @mysql_connect($hostname, $username, $password);
$selected = @mysql_select_db($database,$dbhandle) ;
if ( ! is_admin() ){
if($selected == true){
//execute the SQL query and return records
$result = mysql_query
("SELECT post_title,guid,post_content FROM wp_posts WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC LIMIT 5");
?>
<style type="text/css">
#fetchd {list-style-type:none;margin:0;padding:0; width:100%;}
#fetchd li{display:block;margin:10px auto;padding:6px 15px;background:#eee;}
#fetchd .more {padding:5px 8px;display:inline-block;margin-top:8px;background:#333;color:#fff;width:auto;}
</style>
<ul id="fetchd">
<?php
//fetch tha data from the database 
while ($row = mysql_fetch_array($result)) {   
		$wpdblink = $row{'guid'};
		$wpdbcon = substr($row{'post_content'}, 0, 100);
		$wpdbtitle = $row{'post_title'};
		?>
    <li>
	<h3><a href="<?php echo $wpdblink ?>"><?php echo $wpdbtitle ?></a></h3>
    <p><?php echo $wpdbcon ?>...<br><a href="<?php echo $wpdblink ?>" class="more">Read more</a></p>
    </li>
    <?php
} ?>
</ul>
<?php
} else {
echo "Unable to Connect to Database";
}	
}
else {
if($selected == true){ ?>
<div id="data-success">
 <span></span><strong><?php _e('Successfully Connected to Database "'.$database.'"') ?></strong><div class="clear"></div>
</div>
<?php } else { ?>
<div id="data-error">
 <span></span><strong><?php _e('Unable to Connect to Database "'.$database.'"') ?></strong><div class="clear"></div>
</div>
<?php }
}
@mysql_close($dbhandle);
}
add_shortcode('wpdb-pull', 'data_connection_admin');
// end of database connection
 
?>