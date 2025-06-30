<?php // default: // Merriweather/Mullish ?


    /**
 * Enqueue our stylesheet and javascript file
 */


	
	
	// enqueue fonts
    $font_hx   = get_field('font_hx', 'options');
    $font_body = get_field('font_body', 'options');
	// enqueue Header Font
	switch ( $font_hx ) {
        case 1: // Merriweather
			$fh = 'Merriweather:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 2: // Poppins
            $fh = 'Poppins:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 3: // Oswald
            $fh = 'Oswald:wght@400;700';
            break;
        case 4: // Barlow Condensed
            $fh = 'Barlow+Condensed:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 5: // Rubik
            $fh = 'Rubik:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 6: // Bitter
            $fh = 'Bitter:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 7: // League Gothic
            $fh = 'League+Gothic:wght@400;500;600;700';
            break;
        case 8: //Exo 2
            $fh = 'Exo+2:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 9: // Libre Baskerville
            $fh = 'Libre+Baskerville:ital,wght@0,400;0,700;1,400';
            break;
        case 10: // Lato
            $fh = 'Lato:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 11: // Playfair Display
			$fh = 'Playfair+Display:wght@400;500;600;700';
            break;
		case 12: // Source Serif 4
            $fh = 'Source+Serif+4:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
            break;
		case 13: // DM Serif Display
			$fh = 'DM+Serif+Display:ital@0;1';
			break;
		case 14: // Roboto Slab
			$fh = 'Roboto+Slabwght@400;500;600;700';
			break;
        case 15: // Montserrat
            $fh = 'Montserrat:ital,wght@0,400..700;1,400..700';
            break;
        default: // Merriweather
            $fh = 'Merriweather:ital,wght@0,400;0,700;1,400;1,700';
    }


	// enqueue Body Font
	switch ( $font_body ) {
        case 1: // Mulish
			$fb = 'Mulish:ital,wght@0,300..700;1,300..700';
            break;
        case 2: // Open Sans
			$fb = 'Open+Sans:ital,wght@0,300..700;1,300..700';
            break;
        case 3: // Montserrat
			$fb = 'Montserrat:ital,wght@0,300..700;1,300..700';
            break;
        case 4: // Raleway
			$fb = 'Raleway:ital,wght@0,300..700;1,300..700';
            break;
        case 5: // PT Serif
			$fb = 'PT+Serif:ital,wght@0,400;0,700;1,400;1,700';
            break;
        case 6: // Alegreya Sans
			$fb = 'Alegreya+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
            break;
        case 7: // Work Sans
			$fb = 'Work+Sans:ital,wght@0,300..700;1,300..700';
            break;
        case 8: // Inter
			$fb = 'Inter:ital,wght@0,300..700;1,300..700';
            break;
		case 9: // Poppins
			$fb = 'Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
			break;
        case 10: // Roboto
            $fb = 'Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
            break;
        default:  // Mulish
            $fb = 'Mulish:ital,wght@0,300..700;1,300..700';
    }


    wp_enqueue_style( 'googleFontHx'   , 'https://fonts.googleapis.com/css2?family='.$fh.'&display=swap', array(), null);
	wp_enqueue_style( 'googleFontsBody', 'https://fonts.googleapis.com/css2?family='.$fb.'&display=swap', array(), null);
