<?php 	
					
	global $wp_query;  
	  
	$total_pages = $wp_query->max_num_pages;  
	  
	if ($total_pages > 1){  
	  
	  $current_page = max(1, get_query_var('paged'));  
	  
	  echo '<div class="pages-nav">';  
	  
	  echo paginate_links(array(  
		  'base' => get_pagenum_link(1) . '%_%',  
		  'format' => '/page/%#%',  
		  'current' => $current_page,  
		  'total' => $total_pages,  
		  'prev_text' => '&laquo; Newer',  
		  'next_text' => 'Older &raquo;'  
		));  
	  
	  echo '</div>';  
	  
	} 

?>			