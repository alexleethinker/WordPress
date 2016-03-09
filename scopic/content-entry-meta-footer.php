<?php if ( !is_single() ) { ?>  
<footer class="entry-footer">
<ul>
<?php $ht_post_view_single = get_post_meta( get_the_ID(), '_ht_post_view_single', true );
if ( $ht_post_view_single == true ) {  ?>
<li><i class="fa fa-link"></i><a href="<?php the_permalink(); ?>"><?php _e( '详情', 'framework' ) ?></a></li>
<?php } ?>
<?php if ( comments_open() ){ ?> 
<li><i class="fa fa-comment"></i><?php echo comments_popup_link( __( '评论', 'framework' ), __( '1条评论', 'framework' ), __( '%条评论', 'framework' ) ); ?> 
</li>
<?php } ?>
</ul>
</footer>
<?php } ?>