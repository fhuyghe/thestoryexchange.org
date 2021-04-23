<article id="post-<?php  the_ID() ?>" <?php post_class('post-item ' . $post_classes) ?>>
    <div class="post-wrap">
        <?php if( has_post_thumbnail() ): ?>
        <div class="entry-thumbnail">
            <div class="thumbnail">
                <a href="<?php the_permalink() ?>" class="post-image-link">
                    <div class="fill">
                        <?php the_post_thumbnail('medium') ?>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>
      <div class="entry-text">
        <?php  if($format == 'advice'): ?>
            <div class="cats">
                <?php $cats = wp_get_post_categories( $post->ID );
            foreach($cats as $id):
                if(cat_is_ancestor_of(35, $id)):
                $cat = get_category( $id );
                echo '<button class="category" data-cat="' . $cat->slug . '">' . $cat->name . '</button>';
                endif;
            endforeach; ?>              
            </div>
        <?php endif ?>
          <h3 class="post-title">
          <a href="<?php the_permalink() ?>">
            <?php  the_title() ?>
            </a>
          </h3>
          <div class="entry-content excerpt">
          <?php  the_excerpt() ?>
          </div>
      </div>
    </div>
  </article>