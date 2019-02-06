<?php get_header(); ?>
<?php
$tag = get_the_tags();
?>
<nav class="header-nav reveal"> 
<a style="text-decoration:none;" class="header-logo"><?php echo $tag[0]->name; ?></a>
<div><p>文章数：<?php echo get_tag_post_count_by_id($tag[0]->term_id); ?></p></div>
<div class="btn-group" style="float: right;margin-top: -80px;">
  <button type="button" class="btn btn-danger"><a href="https://www.ouorz.com/" style="text-decoration:none;color:white"><i class="czs-user-l" style="margin-right:5px" ></i>回到首页</a></button>
</div>
</nav>
<div>
<?php $args = array(
	'orderby'            => 'count',
	'style'              => 'list'
); 
 wp_list_categories( $args );
?>
</div>
                    <ul class="article-list">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if(in_category(3)){ ?>
                        <li class="article-list-item reveal post-type-book-card" uk-scrollspy="cls:uk-animation-slide-left-small">
    <!-- <div class="post-type-book-bg" style="background-image: url(<?php //echo 'https://static.ouorz.com/sunglasses-apple-iphone-desk%20%281%29.jpg?imageView2/1/w/660/h/500/format/jpg/interlace/1/q/100|imageslim'; ?>);"></div> -->
        <div style="float:right;">
                <h4 class="post-type-book">读书<br>笔记</h4>                            
        </div>
    <a href="<?php the_permalink(); ?>" style="text-decoration: none;">
                                 <h5 style="color: #333;text-shadow: 0 2px 3px rgba(0,0,0,0.1);font-size: 1.6rem !important;overflow: hidden;text-overflow: ellipsis;width: 45%;"><?php the_title(); ?><span class="icon icon-ios-arrow-thin-right"></span></h5>
                            </a>
                            <p>
                                </p><p style="color: #615b5b;"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <p></p>
                            <div class="article-list-footer" style="">
                                <span class="article-list-date" style="color: #ada8a8;"><?php the_time('y-m-d') ?></span>
                                <span class="article-list-divider" style="color: #ada8a8;">-</span>
                                <span class="article-list-minutes" style="color: #ada8a8;"><?php echo getPostViews(get_the_ID()); ?></span>
</div>
</li>
                        <?php }else{ ?>
                        <li class="article-list-item reveal" uk-scrollspy="cls:uk-animation-slide-left-small">
                            <div style="<?php if(in_category(7)){ echo "float:left;";}else echo"display:none;"; ?>">
                            <?php if(in_category(7)){ echo '<h4 class="post-type-research">研究<br>学习</h4>';} ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" style="text-decoration: none;">
                                 <h5><?php the_title(); ?><span class="icon icon-ios-arrow-thin-right"></span></h5>
                            </a>
                            <p>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 90); ?></p>
                            </p>
                            <div class="article-list-footer">
                                <span class="article-list-date"><?php the_time('y-m-d') ?></span>
                                <span class="article-list-divider">-</span>
                                <span class="article-list-minutes"><?php echo getPostViews(get_the_ID()); ?></span>
                        </li>
                        <?php } ?>
                        
                        
                        <?php endwhile; ?>
                        <?php else : ?>
                        <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
                        <p>没有找到任何文章！</p>
                        <?php endif; ?>
                    </ul>
<?php get_footer(); ?>