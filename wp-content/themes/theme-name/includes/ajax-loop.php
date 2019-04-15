<?php
function rm_filter_posts_by_ajax(){

	if(isset($_POST['page'])){
		$paged = $_POST['page'];
	}

	$args = array(
        'posts_per_page'          =>12,
        'orderby'                 => 'date', // we will sort posts by date
        'paged'                   => $paged,
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);

 
	$query = new WP_Query( $args );
	// Pagination fix
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $query;

	//print_r( $query );
 
	if( $query->have_posts() ) : while( $query->have_posts() ): $query->the_post();
        get_template_part( 'partials/content', 'related-post');
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No se encontraron asociaciones';
    endif; ?>
    	<section class="col-md-12 pagination-links">
			<?php 
			$options = array(
				'prev_text'        => __(''),
				'next_text'        => __(''),
				'current' 		   => $paged,
            	'total'            => $query->max_num_pages,
        		); ?>                
        	 <div class="page-numbers-container">
                <?php  echo paginate_links( $options  ); ?>
            </div>

                            
        </section>
 
 <?php
 
	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query;
	die();
}
 
 
add_action('wp_ajax_myfilter', 'rm_filter_posts_by_ajax'); 
add_action('wp_ajax_nopriv_myfilter', 'rm_filter_posts_by_ajax');


?>