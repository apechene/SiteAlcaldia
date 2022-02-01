<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="pi-row">
          
  <!-- Post thumbnail -->
  <div class="pi-col-sm-4">
    <?php print $fields['field_images']->content; ?>
  </div>
  <!-- End post thumbnail -->
  
  <!-- Post content -->
  <div class="pi-col-sm-8">
    <h2 class="h3 pi-margin-top-minus-5">
      <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-dark"><?php print $fields['title']->content; ?></a>
    </h2>
    <ul class="pi-meta">
      <li><i class="icon-user"></i>by <a href="<?php print url('user/' . $fields['uid']->content); ?>"><?php print $fields['name']->content; ?></a></li>
      <li><i class="icon-clock"></i><?php print $fields['created']->content; ?></li>
      <li><i class="icon-comment"></i><a href="<?php print url('node/' . $fields['nid']->content); ?>"><?php print $fields['comment_count']->content; ?> <?php print t('Comment' . ($fields['comment_count']->content == 1 ? '' : 's')); ?></a></li>
    </ul>
    <p><?php print $fields['body']->content; ?></p>
    <p>
      <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="btn pi-btn-base">
        <?php print t('Read'); ?>
      </a>
    </p>
  </div>
  <!-- End post content -->  
</div>
<hr class="pi-divider pi-divider-dashed pi-divider-big">