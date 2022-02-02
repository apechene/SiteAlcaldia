<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<?php if(!$teaser): ?>
  <div class = "pi-section-white">
    <?php print isset($content['field_images']) ? render($content['field_images']) : ''; ?>

    <!-- Row -->
    <div class="pi-row pi-padding-bottom-10">
      
      <!-- Col 8 -->
      <div class="pi-col-sm-8 pi-padding-bottom-30">
        <?php if($content['body']['#label_display'] != 'hidden'): ?>
          <h4 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-20"><?php print $content['body']['#title']; $content['body']['#label_display'] = 'hidden'; ?></h4>
        <?php endif; ?>
        <?php print render($content['body']); ?>
        <?php print isset($content['field_social_links']) ? render($content['field_social_links']) : ''; ?>
      </div>
      <!-- End col 8 -->
      
      <!-- Col 4 -->
      <div class="pi-col-sm-4 pi-padding-bottom-30">
        <h4 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-10"><?php print t('Details'); ?></h4>
        
        <div class="pi-responsive-table-2xs">
          <table class="pi-table pi-table-hovered">
            
            <!-- Table body -->
            <tbody>
              
              <?php foreach(array('client', 'skills', 'categories') as $field): if(isset($content['field_' . $field])): ?>
              <!-- Table row -->
              <tr>
                <td style="padding-left: 0; padding-right: 10px;">
                  <span class="pi-smaller-text pi-text-dark pi-uppercase pi-weight-700"><?php print $content['field_' . $field]['#title']; $content['body']['#label_display'] = 'hidden';?>:</span>
                </td>
                <td style="padding-right: 0; padding-left: 10px;">
                  <?php print render($content['field_' . $field]); ?>
                </td>
              </tr>
              <!-- End table row -->
              <?php endif; endforeach; ?>
            
            </tbody>
            <!-- End table body -->
            
          </table>
        </div>
        <?php print isset($content['field_link']) ? '<p>' . render($content['field_link']) . '</p>': ''; ?>
      </div>
      <!-- End col 4 -->
      
    </div>
    <!-- End row -->
  </div>

  <?php print render($content); ?>

<?php else: ?>

  <?php print render($content);?>

<?php endif; ?>