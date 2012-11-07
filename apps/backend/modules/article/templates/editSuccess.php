<?php use_helper('I18N', 'Date') ?>
<?php include_partial('article/assets') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_javascript('link-generator.ajax.js') ?>
<script type="text/javascript">
/* <![CDATA[ */
generate_link("#rise_article_rise_menu_id", "<?php echo url_for2('rise_menu_generate', array('id' => $rise_article->getId(), 'route_name' => 'article_show', 'object_name' => 'article')) ?>");
/* ]]> */
</script>

<div id="sf_admin_container">
  <h1><?php echo __('Edycja artykułu', array(), 'messages') ?></h1>

  <?php include_partial('article/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('article/form_header', array('rise_article' => $rise_article, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('article/form', array('rise_article' => $rise_article, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('article/form_footer', array('rise_article' => $rise_article, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
