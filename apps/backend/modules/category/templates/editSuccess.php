<?php use_helper('I18N', 'Date') ?>
<?php include_partial('category/assets') ?>
<?php use_javascript('jquery-1.3.2.min.js') ?>
<?php use_javascript('link-generator.ajax.js') ?>
<script type="text/javascript">
/* <![CDATA[ */
generate_link("#rise_category_rise_menu_id","<?php echo url_for2('rise_menu_generate', array('id' => $rise_category->getId(), 'route_name' => 'category_show', 'object_name' => 'category')) ?>");
/* ]]> */
</script>
<div id="sf_admin_container">
  <h1><?php echo __('Edytuj pojedynczą kategorie', array(), 'messages') ?></h1>

  <?php include_partial('category/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('category/form_header', array('rise_category' => $rise_category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('category/form', array('rise_category' => $rise_category, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('category/form_footer', array('rise_category' => $rise_category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
