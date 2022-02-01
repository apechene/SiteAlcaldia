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
global $recent_news_counter;
$recent_news_counter = isset($recent_news_counter) ? $recent_news_counter + 1 : 1;
?>
<div class="pi-news-date">
  <?php print date('d', strtotime($row->field_field_date[0]['raw']['value'])); ?>
  <span><?php print t(date('M', strtotime($row->field_field_date[0]['raw']['value']))); ?></span>
</div>
<h2 class="h5 pi-margin-top-minus-5 pi-margin-bottom-5">
  <a href="<?php print $fields['path']->content; ?>" class="pi-link-dark"><?php print $fields['title']->content; ?></a>
</h2>
<ul class="pi-meta pi-margin-bottom-10">
  <li><i class="icon-clock"></i><?php print date('M d, y', strtotime($row->field_field_date[0]['raw']['value'])); ?></li>
  <?php if(isset($fields['name'])): ?>
    <li><i class="icon-user"></i><?php print t('by'); ?> <?php print $fields['name']->content; ?></li>
  <?php endif;?>
  <?php if(isset($fields['comment_count'])): ?>
    <li><i class="icon-comment"></i><a href="<?php print $fields['path']->content; ?>"><?php print $fields['comment_count']->content; ?> <?php print t('comments'); ?></a></li>
  <?php endif;?>
</ul>
<p><?php print $fields['body']->content; ?> <a href="<?php print $fields['path']->content; ?>" class="pi-italic"><?php print t('Read more'); ?></a></p>

<?php if($recent_news_counter != count($view->result)): ?>
  <hr class="pi-divider pi-divider-dashed">
<?php else: $recent_news_counter = 0; endif;?>
