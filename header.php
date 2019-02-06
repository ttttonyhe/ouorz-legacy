<html>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '没有找到页面';
	} else {
		wp_title('',true);
	} ?></title>
	    <meta name="keywords" content="<?php echo get_option('king_gjc');?>"/>
        <meta name="description" content="<?php echo get_option('king_ms');?>">
        <link rel="Shortcut Icon" href="https://static.ouorz.com/tonyhe.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://static.ouorz.com/popper.min.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/caomei-cion.css">
        <link rel="stylesheet" href="https://static.ouorz.com/bootstrap.min.css">
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
        <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
        <link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
    </head>
        <body>
        <div id="jv-loadingbar"></div>
        <script type="text/javascript">
$("#jv-loadingbar").show();
$("#jv-loadingbar").animate({width:"20%"},100);
</script>
<script type="text/javascript">
$("#jv-loadingbar").animate({width:"100%"},100,function(){
$("#jv-loadingbar").fadeOut(1000,function(){$("#jv-loadingbar").css("width","0");});
});
</script>
        <main role="main">
            <div class="grid grid-centered">
                <div class="grid-cell">
                    