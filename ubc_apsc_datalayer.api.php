<?php

/**
 * @file
 *
 * The contents of this file are never loaded, or executed, it is purely for
 * documentation purposes.
 *
 * @link https://www.drupal.org/docs/develop/coding-standards/api-documentation-and-comment-standards#hooks
 * Read the standards for documenting hooks. @endlink
 *
 */

/**
 * Implement hook_datalayer_alter() and alter the Data Layer data before it is output to the screen.
 * Parameters: array $data_layer: GTM data layer data for the current page.
 */

function ubc_apsc_datalayer_datalayer_alter(&$data_layer) {
  
  if(isset($data_layer['entityType']) && $data_layer['entityType'] == 'node') {
	  
	  if(array_key_exists('entityTaxonomy', $data_layer)) {
	
		foreach($data_layer['entityTaxonomy'] as $taxonomy => $terms) {
			// include an additional CSV list of taxonomy terms in the datalayer
			$data_layer['entityTaxonomy'][$taxonomy]['list'] = implode(', ', $terms);
			
		}
	}
  }    
}
