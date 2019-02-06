<?php get_header(); ?>
<?php
$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
$category = get_the_category();
?>
<nav class="header-nav reveal"> 
<a style="text-decoration:none;" class="header-logo"><?php if($category[0]){echo $category[0]->cat_name;} ?></a>
<div style="color: #666;"><?php echo category_description();?></div>
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
                        <?php }elseif(in_category(2) || in_category(5)){ ?>
                        <li class="article-list-item reveal post-type-book-card" uk-scrollspy="cls:uk-animation-slide-left-small">
                            <div class="article-list-avatar" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>);"></div>
                            <a href="<?php echo get_post_meta($post->ID,'link',true); ?>" style="text-decoration: none;">
                                <h5 style="color: #333;text-shadow: 0 2px 3px rgba(0,0,0,0.1);font-size: 2rem !important;overflow: hidden;text-overflow: ellipsis;width: 45%;margin-bottom: 0px;margin-top: 5px;"><?php the_title(); ?><span class="icon icon-ios-arrow-thin-right"></span></h5>
                            </a>
                            <p style="color: #615b5b;margin-top: 5px;font-size: 1rem;"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <div class="article-list-footer" style="">
                                <span class="article-list-date" style="color: #ada8a8;">添加于 <?php the_time('y-m-d') ?></span>
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
<?php get_footer(); ?>