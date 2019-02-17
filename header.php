<html lang="zh">
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
	    <meta http-equiv="x-dns-prefetch-control" content="on" />
        <link rel="dns-prefetch" href="https://static.ouorz.com" />
	    <meta name="keywords" content="<?php echo get_option('king_gjc');?>"/>
        <meta name="description" content="<?php echo get_option('king_ms');?>">
        <link rel="Shortcut Icon" href="https://static.ouorz.com/tonyhe.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://static.ouorz.com/popper.min.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/caomei-cion.css">
        <link rel="stylesheet" href="https://static.ouorz.com/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
        <link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
        <script type="text/javascript" src="https://static.ouorz.com/vue.min.js"></script>
        <script>Vue.config.devtools = true</script>
        <script type="text/javascript" src="https://static.ouorz.com/axios.min.js"></script>
        <!-- <script src="https://cdn.bootcss.com/vue-router/3.0.2/vue-router.min.js"></script> -->
        <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?20265c137ab04d39313561665f1ae7a1";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

    </head>
        <body id="body">
            
            
            
            <header class="tony-header-fixed" id="header-div">
                <?php if(is_single()){ ?>
                <div class="header-div1">
        	<a href="https://www.ouorz.com" style="display: inline-block;"><img src="https://static.ouorz.com/wp-content/uploads/2018/12/1545493741-tonyhe.jpg"></a>
<a href="https://www.ouorz.com/feed" style="display: inline-block;margin-top: 12px;margin-left: 15px;"><button type="button" class="btn btn-light" style="letter-spacing: 1px;font-weight: 500;">RSS订阅</button></a>
        </div>
                <?php }else{ ?>
        <div class="header-div1-1">
        	<a href="https://www.ouorz.com"><img src="https://static.ouorz.com/wp-content/uploads/2018/12/1545493741-tonyhe.jpg"></a>
        </div>
        <?php } ?>
        <div class="header-div2">
            <a href="https://www.ouorz.com"><button type="button" class="btn btn-light" style="letter-spacing: 1px;font-weight: 500;">首页</button></a>
            <a href="https://www.ouorz.com/comment.html"><button type="button" class="btn btn-light" style="letter-spacing: 1px;font-weight: 500;">留言集</button></a>
            <div class="btn-group" role="group" style=""><button type="button" class="btn btn-primary" style="letter-spacing: 1px;font-weight: 600;padding-right: 5px;"><a href="https://www.ouorz.com/126"></a><a href="https://www.ouorz.com/126" style="text-decoration:none;color:white"><i class="czs-user-l" style="margin-right:5px"></i>关于我</a></button>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">无法联系</span>
  </button>
  <div class="dropdown-menu" style="letter-spacing:0px !important">
    <a class="dropdown-item" href="https://log.ouorz.com/log?view=1">NoteBook</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="http://wpa.qq.com/msgrd?v=3&amp;uin=36624065&amp;site=qq&amp;menu=yes">QQ</a>
    <a class="dropdown-item" href="mailto:he@holptech.com">Email</a>
    <a class="dropdown-item" href="https://weibo.com/HLPYSYLW">Weibo</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="https://twitter.com/iamtonyhe">Twitter</a>
    <a class="dropdown-item" href="https://www.facebook.com/he.tony.351">Facebook</a>
    <a class="dropdown-item" href="https://www.instagram.com/iamtonyhe/">Instagram</a>
  </div>
</div>
        </div>
    </header>
    
    <div id="view-div" style="transition: all 0.2s ease 0s;width: 50%;transform: translateX(50%);z-index: 2;text-align: center;position: fixed;top: 16px;letter-spacing: 2px;display:none"><p style="font-weight: 600;font-size: 1.2rem;color: #555;" id="view-text"></p></div>
    
    <script>
    $(window).scroll(function() {
        var to_top_header = $(document).scrollTop();
        if (to_top_header <= 0) {
            $('#header-div').attr('class','tony-header-fixed');
            $('#view-div').css('display','none');
            
            $('#header-div').hover(function(){
            $('#header-div').attr('class','tony-header-scoll');
            },function(){
            $('#header-div').attr('class','tony-header-fixed');
            })
            
        }else{
            $('#header-div').attr('class','tony-header-scoll');
            $('#view-div').css('display','block');
            
            $('#header-div').hover(function(){
            $('#header-div').attr('class','tony-header-scoll');
            },function(){
            $('#header-div').attr('class','tony-header-scoll');
            })
        }
      });
      
    </script>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
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
            <div class="grid grid-centered" style="<?php if(!is_single() && !is_page()) echo 'max-width: 660px;padding: 0px 20px;margin-top: 80px;'; ?>">
                <div class="grid-cell" id="grid-cell">
                    