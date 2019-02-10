<?php get_header(); ?>

<div id="header_info">
    <nav class="header-nav reveal">
        <a style="text-decoration:none;" href="https://www.ouorz.com" class="header-logo" title="TonyHe">TonyHe</a>
        <p class="lead" style="margin-top: 0px;">Just A Poor Lifesinger</p>
    </nav>
    <div class="index-cates">
        <li class="cat-item cat-item-4 cat-real" style="display:none" v-for="cate in cates" v-if="cate.count !== 0"> <a :href="cate.link" :title="cate.description">{{ cate.name }}</a>
        </li>
        <li class="cat-item cat-item-4" style="display: inline-block;width: 98%;height: 35px;box-shadow: none;border-radius: 0px;background: rgb(236, 237, 239);" v-if="loading_cates"></li>
    </div>
    <div>
        <ul class="post_tags">
            <li class="cat-real" v-for="tag in tages" style="display:none">
                <a :href="tag.link">#{{ tag.name }}</a>
            </li>
            <li style="background: rgb(236, 237, 238);height: 25px;width: 100%;" v-if="loading_tages"></li>
        </ul>
    </div>
</div>
<ul class="article-list" style="opacity:0">
    
    <!-- 占位DIV -->
    <li uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview" v-if="loading"><em class="article-list-type1" style="padding: 5.5px 44px;">&nbsp;</em>  <a style="text-decoration: none;"><h5 style="background: rgb(236, 237, 238);">&nbsp;</h5></a><p style="background: rgb(246, 247, 248);width: 90%;">&nbsp;</p><p style="background: rgb(246, 247, 248);width: 60%;">&nbsp;</p>
    </li>
    <!-- 占位DIV -->
    
    <li class="article-list-item reveal index-post-list" uk-scrollspy="cls:uk-animation-slide-left-small" v-for="post in posts"> 
        <em v-if="post.post_categories[0].term_id === 7" class="article-list-type1">{{ post.post_categories[0].name }}</em>
        <a :href="post.link" style="text-decoration: none;"><h5 v-html="post.title.rendered"></h5></a>
        <p v-html="post.post_excerpt"></p>
        <div class="article-list-footer"> 
            <span class="article-list-date">{{ post.post_date }}</span>
            <span class="article-list-divider">-</span>
            <span v-if="post.post_metas.views !== ''" class="article-list-minutes">{{ post.post_metas.views }}&nbsp;Views</span>
            <span v-else class="article-list-minutes">0&nbsp;Views</span>
        </div>
    </li>
    
    <!-- 加载占位DIV -->
    <li uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview bottom"><em class="article-list-type1" style="padding: 5.5px 45px;">&nbsp;</em>  <a style="text-decoration: none;"><h5 style="background: rgb(236, 237, 238);">&nbsp;</h5></a><p style="background: rgb(246, 247, 248);width: 90%;">&nbsp;</p><p style="background: rgb(246, 247, 248);width: 60%;">&nbsp;</p>
    </li>
    <!-- 加载占位DIV -->
    
    <!-- 加载按钮 -->
    <button @click="new_page" id="scoll_new_list" style="opacity:0"></button>
    <!-- 加载按钮 -->
</ul>


<script>
window.onload = function(){ //避免爆代码
        
        var click = 0; //初始化加载次数
        var paged = 1; //获取当前页数
        
        /* 展现内容(避免爆代码) */
        $('.article-list').css('opacity','1');
        $('.cat-real').attr('style','display:inline-block');
        /* 展现内容(避免爆代码) */
        
        new Vue({ //axios获取顶部信息
            el : '#grid-cell',
            data() {
                return {
                    posts: null,
                    cates: null,
                    tages: null,
                    loading: true, //v-if判断显示占位符
                    loading_cates: true,
                    loading_tages: true,
                    errored: true
                }
            },
            mounted () {
                //获取分类
                axios.get('https://www.ouorz.com/wp-json/wp/v2/categories?exclude=1')
                 .then(response => {
                     this.cates = response.data;
                 })
                 .finally(() => {
                     this.loading_cates = false;
                     
                     //获取标签
                     axios.get('https://www.ouorz.com/wp-json/wp/v2/tags')
                     .then(response => {
                         this.tages = response.data;
                     }).finally(() => {
                        this.loading_tages = false;
                     });
                     
                 });
                
                //获取文章列表
                axios.get('https://www.ouorz.com/wp-json/wp/v2/posts?per_page=10&page='+paged+'&categories_exclude=5,2')
                 .then(response => {
                     this.posts = response.data
                 })
                 .catch(e => {
                     this.errored = false
                 })
                 .finally(() => {
                     this.loading = false;
                     paged++; //加载完1页后累加页数
                    //加载完文章列表后监听滑动事件
                    $(window).scroll(function(){
　　                    var scrollTop = $(window).scrollTop();
　　                    var scrollHeight = $('.bottom').offset().top - 800;
　　                    if(scrollTop >= scrollHeight){
　　                        if(click == 0){ //接近底部加载一次新文章
　　　　                        $('#scoll_new_list').click();
　　　　                        click++; //加载次数计次
　　                        }
　　                    }
                    });
                    
                })
            },
            methods: { //定义方法
                new_page : function(){ //加载下一页文章列表
                    axios.get('https://www.ouorz.com/wp-json/wp/v2/posts?per_page=10&page='+paged+'&categories_exclude=5,2')
                 .then(response => {
                     if(response.data.length !== 0){ //判断是否最后一页
                         this.posts.push.apply(this.posts,response.data); //拼接在上一页之后
                         click = 0;
                         paged++;
                     }else{
                         $('.bottom h5').html('暂无更多文章了 O__O "…').css({'background':'#fff','color':'#999'});
                     }
                 })
            }
                },
        });
        
        
}
</script>
<?php get_footer(); ?>