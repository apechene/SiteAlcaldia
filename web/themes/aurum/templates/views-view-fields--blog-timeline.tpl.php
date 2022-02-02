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
$image = _get_node_field($row, 'field_field_images');
$path = isset($image[0]) ? $image[0]['raw']['uri'] : '';
global $portfolio_odd_even, $portfolio_month;
$portfolio_odd_even++;
$new_month = date('F Y', $row->node_created);
?>
<?php if($new_month != $portfolio_month): $portfolio_month = $new_month; ?>
  <div class="pi-timeline-date"><?php print $new_month; ?></div>
<?php endif; ?>

<!-- Blog timeline item -->
<div class="pi-timeline-item pi-timeline-item-<?php print $portfolio_odd_even % 2 ? 'left' : 'right'; ?>">
  <div class="pi-timeline-item-date"><span><?php print date('d', $row->node_created); ?></span><span><?php print t(date('M', $row->node_created)); ?></span></div>
  <!-- Post -->

  <!-- Post thumbnail -->
  <div class="pi-img-w pi-img-round-corners pi-img-shadow-light pi-margin-bottom-25">
    <a href="<?php print url('node/' . $fields['nid']->content); ?>">
      <?php print $fields['field_images']->content; ?>
        <span class="pi-img-overlay pi-no-padding pi-img-overlay-dark">
          <span class="pi-caption-centered">
            <span>
              <span class="pi-caption-icon pi-caption-scale icon-plus"></span>
            </span>
          </span>
        </span>
    </a>
  </div>
  <!-- End post thumbnail -->

  <!-- Post content -->
  <h2 class="h3">
    <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="pi-link-dark"><?php print $fields['title']->content; ?></a>
  </h2>
  <ul class="pi-meta">
    <li><i class="icon-user"></i><?php print t('by'); ?> <?php print $fields['name']->content; ?></li>
    <li><i class="icon-comment"></i><a href="<?php print url('node/' . $fields['nid']->content); ?>"><?php print $fields['comment_count']->content; ?> <?php print t('Comment' . ($fields['comment_count']->content == 1 ? '' : 's')); ?></a></li>
  </ul>

  <p>
    <?php print $fields['body']->content; ?>
  </p>
  <p>
    <a href="<?php print url('node/' . $fields['nid']->content); ?>" class="btn pi-btn-base">
      <?php print t('Read'); ?>
    </a>
  </p>
  <!-- End post content -->

  <!-- End post -->
</div>
<!-- End Blog timeline  item -->