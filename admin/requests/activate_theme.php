<?php
if (isset($_POST['activate_theme']) && !empty($_POST['theme']) && isset($_POST['keep_blank']) && empty($_POST['keep_blank']) && $logged_in == true) {
    $theme = SK_secureEncode($_POST['theme']);
    $saved = false;
    
    if (file_exists('../themes/' . $theme . '/info.php')) {
        $query = "UPDATE " . DB_CONFIGURATIONS . " SET theme='$theme'";
        $sql_query = mysqli_query($dbConnect, $query);
        
        if ($sql_query) {
            $saved = true;
        }
    }
    
    if ($saved == true) {
        $post_message = '<div class="post-success">Theme was activated! <a href="' . $site_url . '">Check it out</a>.</div>';
    } else {
        $post_message = '<div class="post-failure">Failed to activate theme. Please try again.</div>';
    }
}
