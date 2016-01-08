<?php
/** 
  * Table
  *
  * Show the Table
  *   
  * @example
  *  
  *  [table][table_tr][table_td]Content 1[/table_td] [table_td]Content 2[/table_td][table_td]Content 3[/table_td][table_td]Content 4[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr][/table]
  *
  *  [table ver="2"][table_tr][table_td]Content 1[/table_td] [table_td]Content 2[/table_td][table_td]Content 3[/table_td][table_td]Content 4[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr]
  *  [table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr][/table]
  *
  **/

function df_table_sc( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'ver' => '1',
    ), $atts));

    if ($ver == 2) {
        $out = '<div class="table-responsive"><table class="table-style2">'.do_shortcode($content).'</table></div>';
    } else if ($ver == 1){
        $out = '<div class="table-responsive"><table class="table-style1">'.do_shortcode($content).'</table></div>';
    }
    else {
        $out = ' <div class="table-responsive"><table>'.do_shortcode($content).'</table></div>';

    }
    return $out;
}
add_shortcode( 'table', 'df_table_sc' );
/*-----------------------------------------------------------------------------------*/

function df_table_tr_sc( $atts, $content = null ) {
    extract(shortcode_atts(array(     
    ), $atts));

    $out = '<tr>' . do_shortcode($content) . '</tr>';
    return $out;
}
add_shortcode( 'table_tr', 'df_table_tr_sc' );
/*-----------------------------------------------------------------------------------*/

function df_table_td_sc( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));

    $out = '<td> '. do_shortcode($content) . '</td>';
    return $out;
}
add_shortcode( 'table_td', 'df_table_td_sc' );