<?php // This template is to handle the padding and class logic for all flex templates

    // flex section bg color
    $bg   = get_sub_field( 'bg') ? ' ' . get_sub_field( 'bg') : ' bg-trans';
    $th   = get_sub_field( 'theme') ?: ' v-light';

    // spacing - top padding
    $pt = ' pt-' . get_sub_field('t_pad');
    $ptt = get_sub_field('t_pad_t') ? ' pt-md-' . get_sub_field('t_pad_t') : '';
    $ptd = get_sub_field('t_pad_d') ? ' pt-xl-' . get_sub_field('t_pad_d') : '';
    $pt = $pt . $ptt . $ptd;

    // spacing - bottom padding
    $pb = ' pb-' . get_sub_field('b_pad');
    $pbt = get_sub_field('b_pad_t') ? ' pb-md-' . get_sub_field('b_pad_t') : '';
    $pbd = get_sub_field('b_pad_d') ? ' pb-xl-' . get_sub_field('b_pad_d') : '';
    $pb = $pb . $pbt . $pbd;

    // option vars
    $cl = get_sub_field('class') ? ' '. get_sub_field('class') : '';
?>