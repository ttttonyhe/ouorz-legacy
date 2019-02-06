<script>
    function closeinfo(){
    var lastread=document.getElementById('lastread');
    lastread.style.display="none";
    }
</script>
<div class="card lastread-card" id="lastread" style="<?php if(!isset($_COOKIE[lastreadtitle]) || !isset($_COOKIE[lastreadlink]) || $_COOKIE[lastreadlink]=='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']){ echo "display:none;"; } ?> box-shadow: 0 1px 3px rgba(249,249,249,0.08), 0 0 0 1px rgba(26,53,71,.04), 0 1px 1px rgba(26,53,71,.06);border:none;z-index: 111;">
  <div class="card-body" style="padding: 1.05rem;">
    <h5 class="card-title">上次读到:</h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_COOKIE['lastreadtitle']; ?></h6>
    <a onclick="closeinfo();" class="card-link lastread-card-a1">关闭提示</a>
<a href="<?php echo $_COOKIE['lastreadlink']; ?>" class="card-link lastread-card-a2">继续阅读</a>
    
  </div>
</div>
<?php get_header(); ?>
<nav class="nav-color navbar fixed-top navbar-light bg-light" style="padding-left: 30px;padding-right: 30px;<?php if(wp_is_mobile()){
    echo "background-color:white !important;";
}else echo "background-color:transparent !important;";?>">
  <a class="navbar-brand" href="https://www.ouorz.com"><button type="button" class="btn btn-outline-dark" style="font-size:12px"><i class="czs-home" style="margin-right: 5px;"></i>首页</button></a>
  <div>
  <a class="navbar-brand" href="https://www.ouorz.com/feed"><button type="button" class="btn btn-outline-warning" style="font-size:12px"><i class="czs-label-info-l" style="margin-right: 5px;"></i>订阅</button></a>
  <a class="navbar-brand" href="https://www.ouorz.com/126"><button type="button" class="btn btn-outline-secondary" style="font-size:12px"><i class="czs-user" style="margin-right: 5px;"></i>关于</button></a>
  </div>
</nav>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<?php $postid=get_the_ID(); $postlink = get_permalink( $postid ); setcookie('lastreadlink',$postlink); ?>
<?php setPostViews($postid); ?>  
                    <article class="article reveal uk-animation-slide-left-small">
                        <header class="article-header">
                            <span class="badge badge-pill badge-danger" style="padding: 7px 12px;margin-bottom: 10px;"><i class="czs-read-l" style="margin-right:5px;"></i>博客文章</span>
                             <h2 style="letter-spacing:1px;margin-top: .5rem;"><?php the_title(); $postitle=get_post($postid)->post_title; setcookie('lastreadtitle',$postitle); ?></h2>
                            <div class="article-list-footer"> <span class="article-list-date"><?php the_time('Y-n-j') ?></span>
 <span class="article-list-divider">/</span>
 <span class="article-list-minutes"><?php echo getPostViews($postid); ?>  </span>
                            </div>
                            <div style="display: block;width: 60px;height: 5px;border-radius: 5px;background: #a94442;margin-top: 20px;"></div>
                        </header>
                         <div class="article-content">
                          <?php the_content(); ?>
                         </div>
                         <div class="article-comments" id="article-comments" style="display:none">
                             <?php if (comments_open()) comments_template( '', true ); ?>
                         </div>
                    </article>
<?php endif; ?>
<?php get_footer(); ?>