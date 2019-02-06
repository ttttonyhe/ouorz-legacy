<?php get_header(); ?>
<?php
$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>
<nav class="header-nav reveal"> 
<a style="text-decoration:none;" href="<?php echo get_option('home'); ?>" class="header-logo" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

<div class="btn-group" style="float: right;margin-top: 27px;">
  <button type="button" class="btn btn-danger"><a href="https://www.ouorz.com/126" style="text-decoration:none;color:white"><i class="czs-user-l" style="margin-right:5px" ></i>关于我</a></button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">无法联系</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="http://wpa.qq.com/msgrd?v=3&uin=36624065&site=qq&menu=yes">QQ</a>
    <a class="dropdown-item" href="mailto:he@holptech.com">Email</a>
    <a class="dropdown-item" href="https://weibo.com/HLPYSYLW">Weibo</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="https://twitter.com/iamtonyhe">Twitter</a>
    <a class="dropdown-item" href="https://www.facebook.com/he.tony.351">Facebook</a>
    <a class="dropdown-item" href="https://www.instagram.com/iamtonyhe/">Instagram</a>
  </div>
</div>
<p class="lead" style="margin-top: 0px;">Just A Poor Lifesinger</p>
</nav>

<div>
<?php $args = array(
	'orderby'            => 'count',
	'style'              => 'list'
); 
 wp_list_categories( $args );
?>
</div>

<div>
<?php 
$html = '<ul class="post_tags">';
foreach (get_tags( array('number' => 50, 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false) ) as $tag){
    $tag_link = get_tag_link($tag->term_id);
    $html .= "<li><a href='{$tag_link}'>";
    $html .= "#{$tag->name}</a></li>";
}
$html .= '</ul>';
echo $html;
?>
</div>


                    <ul class="article-list">
                        <?php 
                            $args = array(
							        'cat' => '-5,-2',
							        'paged' => $paged
						        );
						    query_posts($args);
                            if (have_posts()) : while (have_posts()) : the_post(); 
                        ?>
                        <?php if(in_category(3)){ ?>
                        <li class="article-list-item reveal post-type-book-card" uk-scrollspy="cls:uk-animation-slide-left-small" style="padding: 60px 10px !important;">
                            <em class="article-list-type2">读书与笔记</em>
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
                        <li class="article-list-item reveal" uk-scrollspy="cls:uk-animation-slide-left-small" style="padding: 60px 10px !important;">
                            <?php if(in_category(7)){ echo '<em class="article-list-type1">研究与学习</em>';} ?>
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
                    
                    <?php the_posts_pagination( array(
										'prev_text'=>'上页',
										'next_text'=>'下页',
										'screen_reader_text' =>'',
										'mid_size' => 1,
									) );?>
                    
<?php get_footer(); ?>