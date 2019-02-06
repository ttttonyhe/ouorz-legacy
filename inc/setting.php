<?php
if(is_admin()){
	 $options = array(
        //开始第一个选项标签数组
        array(
            'title' => '基本设置',//标签显示的文字
            'id'    => 'king_one',//标签的ID
            'type'  => 'panelstart' //顶部标签的类型
        ),
        
	array(
		'name' => '关键词',
		'id' => 'king_gjc',
		'type' => 'textarea'),
	array(
		'name' => '描述',
		'id' => 'king_ms',
		'type' => 'textarea'),
	array(
		'name' => '站长统计',
		'id' => 'king_zztj',
		'type' => 'textarea'),
	
	array(
            'type'  => 'panelend'//标签段的结束
        ),
    );
    //主题后台设置已完成，下面可以不用看了
    function git_add_theme_options_page() {
        global $options;
        if ($_GET['page'] == basename(__FILE__)) {
            if ('update' == $_REQUEST['action']) {
                foreach($options as $value) {
                    if (isset($_REQUEST[$value['id']])) {
                        update_option($value['id'], $_REQUEST[$value['id']]);
                    } else {
                        delete_option($value['id']);
                    }
                }
                update_option('git_options_setup', true);
                header('Location: themes.php?page=setting.php&update=true');
                die;
            } else if( 'reset' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    delete_option($value['id']);
                }
                delete_option('git_options_setup');
                header('Location: themes.php?page=setting.php&reset=true');
                die;
            }
        }
        add_theme_page('King主题设置', 'King主题设置', 'edit_theme_options', basename(__FILE__) , 'git_options_page');
    }
    add_action('admin_menu', 'git_add_theme_options_page');
     
    function git_options_page() {
        global $options;
        $optionsSetup = get_option('git_options_setup') != '';
        if ($_REQUEST['update']) echo '<div class="updated"><p><strong>设置已保存。</strong></p></div>';
        if ($_REQUEST['reset']) echo '<div class="updated"><p><strong>设置已重置。</strong></p></div>';
    ?>
     
    <div class="wrap">
        <h2>主题设置</h2>
        <input placeholder="筛选主题选项…" type="search" id="theme-options-search" />
        <form method="post">
            <h2 class="nav-tab-wrapper">
    <?php
    $panelIndex = 0;
    foreach ($options as $value ) {
        if ( $value['type'] == 'panelstart' ) echo '<a href="#' . $value['id'] . '" class="nav-tab' . ( $panelIndex == 0 ? ' nav-tab-active' : '' ) . '">' . $value['title'] . '</a>';
        $panelIndex++;
    }
    ?>
    </h2>
    <!-- 开始建立选项类型 -->
    <?php
    $panelIndex = 0;
    foreach ($options as $value) {
    switch ( $value['type'] ) {
        case 'panelstart'://最高标签
            echo '<div class="panel" id="' . $value['id'] . '" ' . ( $panelIndex == 0 ? ' style="display:block"' : '' ) . '><table class="form-table">';
            $panelIndex++;
            break;
        case 'panelend':
            echo '</table></div>';
            break;
        case 'subtitle':
            echo '<tr><th colspan="2"><h3>' . $value['title'] . '</h3></th></tr>';
            break;
        case 'text':
    ?>
    <tr>
        <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <label>
            <input name="<?php echo $value['id']; ?>" class="regular-text" id="<?php echo $value['id']; ?>" type='text' value="<?php if ( $optionsSetup || get_option( $value['id'] ) != '') { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?>" />
            <span class="description"><?php echo $value['desc']; ?></span>
            </label>
        </td>
    </tr>
    <?php
        break;
        case 'number':
    ?>
    <tr>
        <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <label>
            <input name="<?php echo $value['id']; ?>" class="small-text" id="<?php echo $value['id']; ?>" type="number" value="<?php if ( $optionsSetup || get_option( $value['id'] ) != '') { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
            <span class="description"><?php echo $value['desc']; ?></span>
            </label>
        </td>
    </tr>
    <?php
        break;
        case 'password':
    ?>
    <tr>
        <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <label>
            <input name="<?php echo $value['id']; ?>" class="regular-text" id="<?php echo $value['id']; ?>" type="password" value="<?php if ( $optionsSetup || get_option( $value['id'] ) != '') { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
            <span class="description"><?php echo $value['desc']; ?></span>
            </label>
        </td>
    </tr>
    <?php
        break;
        case 'textarea':
    ?>
    <tr>
        <th><?php echo $value['name']; ?></th>
        <td>
            <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
            <p><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="5" cols="50" class="large-text code"><?php if ( $optionsSetup || get_option( $value['id'] ) != '') { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></p>
        </td>
    </tr>
    <?php
        break;
        case 'select':
    ?>
    <tr>
        <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <label>
                <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) : ?>
                    <option value="<?php echo $option; ?>" <?php selected( get_option( $value['id'] ), $option); ?>>
                        <?php echo $option; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <span class="description"><?php echo $value['desc']; ?></span>
            </label>
        </td>
    </tr>
     
    <?php
        break;
        case 'radio':
    ?>
    <tr>
        <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
        <td>
            <?php foreach ($value['options'] as $name => $option) : ?>
            <label>
                <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php checked( get_option( $value['id'] ), $option); ?>>
                <?php echo $name; ?>
            </label>
            <?php endforeach; ?>
            <p><span class="description"><?php echo $value['desc']; ?></span></p>
        </td>
    </tr>
     
    <?php
        break;
        case 'checkbox':
    ?>
    <tr>
        <th><?php echo $value['name']; ?></th>
        <td>
            <label>
                <input type='checkbox' name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php echo checked(get_option($value['id']), 1); ?> />
                <span><?php echo $value['desc']; ?></span>
            </label>
        </td>
    </tr>
     
    <?php
        break;
        case 'checkboxs':
    ?>
    <tr>
        <th><?php echo $value['name']; ?></th>
        <td>
            <?php $checkboxsValue = get_option( $value['id'] );
            if ( !is_array($checkboxsValue) ) $checkboxsValue = array();
            foreach ( $value['options'] as $id => $title ) : ?>
            <label>
                <input type="checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>[]" value="<?php echo $id; ?>" <?php checked( in_array($id, $checkboxsValue), true); ?>>
                <?php echo $title; ?>
            </label>
            <?php endforeach; ?>
            <span class="description"><?php echo $value['desc']; ?></span>
        </td>
    </tr>
    <?php
        break;
    }
    }
    ?>
    <!-- 结束建立选项类型 -->
    <p class="submit">
        <input name="submit" type="submit" class="button button-primary" value="保存选项"/>
        <input type="hidden" name="action" value="update" />
    </p>
    </form>
    <form method="post">
    <p>
        <input name="reset" type="submit" class="button button-secondary" value="重置选项" onclick="return confirm('你确定要重置选项吗？重置之后您的全部设置将被清空，您确定您没有搞错？？ ');"/>
        <input type="hidden" name="action" value="reset" />
    </p>
    </form>
    </div>
    <style>.panel{display:none}.panel h3{margin:0;font-size:1.2em}#panel_update ul{list-style-type:disc}.nav-tab-wrapper{clear:both}.nav-tab{position:relative}.nav-tab i:before{position:absolute;top:-10px;right:-8px;display:inline-block;padding:2px;border-radius:50%;background:#e14d43;color:#fff;content:"\f463";vertical-align:text-bottom;font:400 18px/1 dashicons;speak:none}#theme-options-search{display:none;float:right;margin-top:-34px;width:280px;font-weight:300;font-size:16px;line-height:1.5}.updated+#theme-options-search{margin-top:-91px}.wrap.searching .nav-tab-wrapper a,.wrap.searching .panel tr,#attrselector{display:none}.wrap.searching .panel{display:block !important}#attrselector[attrselector*=ok]{display:block}</style>
    <style id="theme-options-filter"></style>
    <div id="attrselector" attrselector="ok" ></div>
    <script>
    jQuery(function ($) {
        $(".nav-tab").click(function () {
            $(this).addClass("nav-tab-active").siblings().removeClass("nav-tab-active");
            $(".panel").hide();
            $($(this).attr("href")).show();
            return false;
        });
     
        var themeOptionsFilter = $("#theme-options-filter");
        themeOptionsFilter.text("ok");
        if ($("#attrselector").is(":visible") && themeOptionsFilter.text() != "") {
            $(".panel tr").each(function (el) {
                $(this).attr("data-searchtext", $(this).text().replace(/\r|\n/g, '').replace(/ +/g, ' ').toLowerCase());
            });
     
            var wrap = $(".wrap");
            $("#theme-options-search").show().on("input propertychange", function () {
                var text = $(this).val().replace(/^ +| +$/, "").toLowerCase();
                if (text != "") {
                    wrap.addClass("searching");
                    themeOptionsFilter.text(".wrap.searching .panel tr[data-searchtext*='" + text + "']{display:block}");
                } else {
                    wrap.removeClass("searching");
                    themeOptionsFilter.text("");
                };
            });
        };
    });
    </script>
    <?php
    }
    //启用主题后自动跳转至选项页面
    global $pagenow;
        if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'setting.php' )
        {
            wp_redirect( admin_url( 'themes.php?page=functions.php' ) );
        exit;
    }
    function git_enqueue_pointer_script_style( $hook_suffix ) {
        $enqueue_pointer_script_style = false;
        $dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
        if( !in_array( 'git_options_pointer', $dismissed_pointers ) ) {
            $enqueue_pointer_script_style = true;
            add_action( 'admin_print_footer_scripts', 'git_pointer_print_scripts' );
        }
        if( $enqueue_pointer_script_style ) {
            wp_enqueue_style( 'wp-pointer' );
            wp_enqueue_script( 'wp-pointer' );
        }
    }
    add_action( 'admin_enqueue_scripts', 'git_enqueue_pointer_script_style' );
    function git_pointer_print_scripts() {
        ?>
        <script>
        jQuery(document).ready(function($) {
            var $menuAppearance = $("#menu-appearance");
            $menuAppearance.pointer({
                content: '<h3>Hi！</h3><p>感谢使用King主题。</p>',
                position: {
                    edge: "left",
                    align: "center"
                },
                close: function() {
                    $.post(ajaxurl, {
                        pointer: "git_options_pointer",
                        action: "dismiss-wp-pointer"
                    });
                }
            }).pointer("open").pointer("widget").find("a").eq(0).click(function() {
                var href = $(this).attr("href");
                $menuAppearance.pointer("close");
                setTimeout(function(){
                    location.href = href;
                }, 700);
                return false;
            });
     
            $(window).on("resize scroll", function() {
                $menuAppearance.pointer("reposition");
            });
            $("#collapse-menu").click(function() {
                $menuAppearance.pointer("reposition");
            });
        });
        </script>
     
    <?php
    }
 }
?>