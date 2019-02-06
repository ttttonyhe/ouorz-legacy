<?php
/*
Template Name: Search
*/
?>
<?php get_header(); ?>
<nav class="navbar fixed-top navbar-light bg-light" style="padding-left: 30px;padding-right: 30px;background-color:transparent !important;">
  <a class="navbar-brand" href="https://www.ouorz.com"><button type="button" class="btn btn-outline-dark" style="font-size:12px">首页</button></a>
  <div>
  <a class="navbar-brand" href="https://www.ouorz.com/feed"><button type="button" class="btn btn-outline-warning" style="font-size:12px">订阅</button></a>
  <a class="navbar-brand" href="https://www.ouorz.com/search.html"><button type="button" class="btn btn-outline-secondary" style="font-size:12px">搜索</button></a>
  </div>
</nav>
<article class="article reveal">
                        <header class="article-header">
                            <span class="badge badge-pill badge-danger" style="padding: 7px 12px;margin-bottom: 10px;">给我留言</span>
                        </header>
                        <div class="article-comments">
                         <?php comments_template(); ?>
                         </div>
                    </article>
<?php get_footer(); ?>