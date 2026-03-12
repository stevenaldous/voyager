<?php // Color Control Panel
//  This file is used to make dashboard controlled colors available to the theme stylesheets
function hex2rgb( $c ) {
    if ( $c[0] == '#' ) {
            $c = substr( $c, 1 );
    }
    if ( strlen( $c ) == 6 ) {
            list( $r, $g, $b ) = array( $c[0] . $c[1], $c[2] . $c[3], $c[4] . $c[5] );
    } elseif ( strlen( $c ) == 3 ) {
            list( $r, $g, $b ) = array( $c[0] . $c[0], $c[1] . $c[1], $c[2] . $c[2] );
    } else {
            return false;
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}


add_action('wp_head', 'voyager_color_panel');

function voyager_color_panel() {

    $colors = array(
                // Theme
        'bg',
        // Primary Color set
        'v1',
        'v1-light',
        'v1-accent',
        // Secondary Color set
        'v2',
        'v2-light',
        'v2-accent',
        'v2-link-hover',
        // Voyager Light Color set
        'hx-light',
        'hx-flair-light',
        'pret-light',
        'subt-light',
        'body-light',
        'flair-light',
        'link-light',
        'link-hover-light',
        // Voyager Dark Color set
        'hx-dark',
        'hx-flair-dark',
        'pret-dark',
        'subt-dark',
        'body-dark',
        'flair-dark',
        'link-dark',
        'link-hover-dark',
        // Neutrals
        'white',
        'n50',
        'n200',
        'n400',
        'n600',
        'n800',
        'n900',
        'black',
        // system
        'error',
        'error-50',
        'warning',
        'warning-50',
        'success',
        'success-50',
        'focus',
        'focus-50',
        'review',
        'review-50',
    );
    echo '<style> :root { ';
    ///////////////////////////////////////////        
    // Set Color variables
    ///////////////////////////////////////////
        // reset Bootstrap color vars
        echo '--bs-black-rgb: 490, 46, 73; --bs-light-rgb: 238, 238, 236;';
        
        // go through $colors array and check for color being set. 
        foreach( $colors as $c ) {
            $v = get_field( 'color-'.$c, 'options' );

            if( is_array($v) ) {  // check if color is stored as an array and set to rgb value
                echo '--color-'.$c.': '.$v['red'].', '.$v['green'].', '.$v['blue'].';';
            }
            elseif ($v) {  
                echo '--color-'.$c.': '.$v .';'; 

                $rgb = hex2rgb( $v );
                echo '--color-rgb-'.$c.': '.$rgb['red'].', '.$rgb['green'].', '.$rgb['blue'].';';
            } // set hex code
        }
    ///////////////////////////////////////////        
    // Set Font Sizes
    ///////////////////////////////////////////        
    // font size set
    $fs_set = array(
        'hx', 'hx-plus', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'body', 'large', 'em', 'sm', 'display', 'hero', 'subh', 'pret', 'nav', 'btn', 'btnsm'
    );
    // font weight set
    $fw_set = array(
        'body', 'large', 'em', 'sm', 'display', 'hero', 'subh', 'pret', 'nav', 'hx', 'hx-plus',
    );
   // line height set
    $lh_set = array(
        'body', 'hx'
    );

    ///////////////////////////////////////////        
    // Set Font Sizes vars
    ///////////////////////////////////////////        
    // set base font size and weights (mobile first)  
    foreach( $fs_set as $t ) {
        $fs = get_field( 'font-'.$t.'-m', 'options' ); 
        if($fs) { echo '--font-size-'.$t.': ' . ( $fs / 16 )  . 'rem;';  }
    }
    // reset font sizes for tablets
    echo '@media screen and (min-width: 798px) {'; 
        foreach( $fs_set as $t ) {
            $fs = get_field( 'font-'.$t.'-t', 'options' );
            if($fs) { echo '--font-size-'.$t.': ' . ( $fs / 16 )  . 'rem;';  }
        } 
    echo '}';
    // reset font sizes for laptops
    echo '@media screen and (min-width: 1200px) {'; 
        foreach( $fs_set as $t ) {
            $fs = get_field( 'font-'.$t.'-d', 'options' );
            if($fs) { echo '--font-size-'.$t.': ' . ( $fs / 16 )  . 'rem;';  }
        } 
    echo '}';
    ///////////////////////////////////////////        
    // Set Font Weight vars
    ///////////////////////////////////////////        
    foreach( $fw_set as $f ) {
        $fw = get_field( 'font-'.$f.'-w', 'options' );
        if($fw) { echo '--font-weight-'.$f.': ' . $fw . ';';  }
    } 
    ///////////////////////////////////////////        
    // Set Line Height vars
    ///////////////////////////////////////////        
    foreach( $lh_set as $l ) {
        $lh = get_field( 'font-'.$l.'-lh', 'options' );
        if($lh) { echo '--font-lh-'.$l.': ' . ( $lh / 100 ) . ';';  }
    } 
    // set font awesome icon for pseudo elements
    if( get_field('fa_def','options') ) {
        echo ' --voy-fa: var(--fa-font-'.get_field('fa_def','options') .');';
    }
    ///////////////////////////////////////////        
    // Nav Max Width (desktop)
    ///////////////////////////////////////////        
    if( get_field('nav_mw','options') ) {
        echo ' --nav-mw: '.get_field('nav_mw','options').'%;';
    }

    ///////////////////////////////////////////        
    // Set BTN Vars (font sizes above)
    ///////////////////////////////////////////        
    if( get_field('btn-rad','options') ) {
        echo ' --radius-btn: '.get_field('btn-rad','options').'px;';
    }
    if( get_field('font-btn-ls','options') ) {
        echo ' --font-ls-btn: '. ( get_field('font-btn-ls','options') / 100 ) .'em;';
    }
    if( get_field('btn-case','options') ) {
        echo ' --case-btn: '.get_field('btn-case','options').';';
    }
    if( get_field('btn-border','options') != null ) {
        echo ' --border-btn: '.get_field('btn-border','options').'px solid currentColor;';
    }
    else {
        echo ' --border-btn: none;';
    }


    ///////////////////////////////////////////        
    // Set Font Families
    ///////////////////////////////////////////        
    $font_hx   = get_field('font_hx', 'options');
    $font_body = get_field('font_body', 'options');


    // Set Header Font Family
    switch ( $font_hx ) {
        case 1: // Barlow Condensed
            echo ' --font-hx: "Barlow Condensed", sans-serif;';
            break;
        case 2: // Bitter
            echo ' --font-hx: "Bitter", serif;';
            break;
        case 3: // DM Serif Display
            echo ' --font-hx: "DM Serif Display", serif;';
            break;
        case 4: //Exo 2
            echo ' --font-hx: "Exo 2", sans-serif;';
            break;
        case 5: // Lato
            echo ' --font-hx: "Lato", sans-serif;';
            break;
        case 6: // League Gothic
            echo ' --font-hx: "League Gothic", sans-serif;';
            break;
        case 7: // Libre Baskerville
            echo ' --font-hx: "Libre Baskerville", serif;';
            break;
        case 8: // Figtree
            echo ' --font-hx: "Figtree", sans-serif;';
            break;
        case 9: // Fjalla One
            echo ' --font-hx: "Fjalla One", serif;';
            break;
        case 10: // Merriweather
            echo ' --font-hx: "Merriweather", serif;';
            break;
        case 11: // Montserrat
            echo ' --font-hx: "Montserrat", sans-serif;';
            break;
        case 12: // Oswald
            echo ' --font-hx: "Oswald", sans-serif;';
            break;
        case 13: // Playfair Display
            echo ' --font-hx: "Playfair Display", serif;';
            break;
        case 14: // Poppins
            echo ' --font-hx: "Poppins", sans-serif;';
            break;
        case 15: // Roboto Slab
            echo ' --font-hx: "Roboto Slab", serif;';
            break;
        case 16: // Rubik
            echo ' --font-hx: "Rubik", sans-serif;';
            break;
        case 17: // Source Serif
            echo ' --font-hx: "Source Serif 4", serif;';
            break;
        case 18: // Syne
            echo ' --font-hx: "Syne", sans-serif;';
            break;
        default: // Merriweather
        echo ' --font-hx: "Merriweather", serif;';
    }


    switch ( $font_body ) {
        case 1: // Alegreya Sans
            echo '--font-body: "Alegreya Sans", sans-serif ;';
            break;
        case 2: // Inter Light
            echo '--font-body: "Inter", sans-serif ;';
            break;
        case 3: // Montserrat
            echo '--font-body: "Montserrat", sans-serif ;';
            break;
        case 4: // Mulish
            echo '--font-body: "Mulish", sans-serif;';
            break;
        case 5: // Open Sans
            echo '--font-body: "Open Sans", sans-serif ;';
            break;
        case 6: // Poppins Light
            echo '--font-body: "Poppins", sans-serif;';
            break;
        case 7: // PT Serif
            echo '--font-body: "PT Serif", serif ;';
            break;
        case 8: // Raleway
            echo '--font-body: "Raleway", sans-serif ;';
            break;
        case 9: // Roboto
            echo '--font-body: "Roboto", sans-serif;';
            break;
        case 10: // Work Sans
            echo '--font-body: "Work Sans", sans-serif ;';
            break;
        case 11: // Jost
            echo '--font-body: "Jost", sans-serif ;';
            break;
        default: // Mulish
        echo '--font-body: "Mulish", sans-serif;';
    }



echo ' } </style>';
}