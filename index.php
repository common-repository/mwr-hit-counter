<?php
/**
 * Plugin Name: MWR Hit Counter
 * Description: Simple hit counter for your website.
 * Version: 1.0.0
 * Author: Daniel M. Ochoa
 * Author URI: https://miwebrentable.com
 */
 

/**
 * If this file is called directly, abort.
 */
 
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once ( ABSPATH . 'wp-admin/includes/upgrade.php' );

function mwr_counter( $content ) {

				global $wpdb;
        		$p = shortcode_atts( array (
  										'start' => '0'
  											), $content );
   
                $tableName = $wpdb->prefix . "mwr_counter";
                $myrows = $wpdb->get_results ( "SELECT ID, counter FROM $tableName WHERE ID='0'" );
                
                if ( !isset ( $_COOKIE['mwrcounter'] ) )
                        {
                                $count = $myrows[0]->counter + 1;
                                $wpdb->update ( $tableName, array (
                                                'counter' => $count
                                ), array (
                                                'ID' => 0
                                ) );
                                
                        }
                else
                        {
                                $count = $myrows[0]->counter;
                        }
                        
                return $content = $count+$p['start'];
        }
/**
 * start counter shortcode.
 */
 
add_shortcode( 'mwrcounter', 'mwr_counter' );

function setting_mwr_counter_cookie() {
                setcookie( 'mwrcounter', '1', time() + ( 86400 * 30 ), "/" );
        }

/**
 * set cookie first time to 30 days.
 */
 
add_action( 'init', 'setting_mwr_counter_cookie' );

function delete_mwr_counter_table() {

				global $wpdb;
				$tableName = $wpdb->prefix . "mwr_counter";
				$sql = "DROP TABLE IF EXISTS $tableName";
				$wpdb->query($sql);

		}

function create_mwr_counter_table() {

                global $wpdb;
                $tableName = $wpdb->prefix . "mwr_counter";
                
                $created = dbDelta ( "CREATE TABLE IF NOT EXISTS $tableName (
                            `ID` bigint(20) NOT NULL DEFAULT '0',
                            `counter` int(9) NOT NULL DEFAULT '0')" );
                
                $wpdb->insert ( $tableName, array(
                                'ID' => '0',
                                'counter' => '0'
                ));
                
        }
        
/**
 * activate and deactivate hook.
 */
 
register_activation_hook( __FILE__, 'create_mwr_counter_table' );
register_deactivation_hook( __FILE__, 'delete_mwr_counter_table' );


