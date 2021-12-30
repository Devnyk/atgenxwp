<?php
/**
 * @package Leverage Extra
 */

function leverage_handle_ajax_request() {

    if ( ! empty( $_POST ) ) {

        require_once( plugin_dir_path( __FILE__ ) . 'recaptcha.php' );

        if ( isset( $_POST['section'] ) && $_POST['section'] == 'leverage_form' ) {
            $source             = 'Contact Form';
            $field_send_options = 'form_sending_options';
            $field_recipient    = 'form_email_recipient';
            $field_webhook_url  = 'form_webhook_url';
            $wpnonce            = 'leverage_form_wpnonce';

            $subject_text    = get_field( 'form_subject_message', 'option' );
            $heading_text    = get_field( 'form_heading_message', 'option' );
            $success_text    = get_field( 'form_success_message', 'option' );
            $validation_text = get_field( 'form_validation_message', 'option' );
            $error_text      = get_field( 'form_error_message', 'option' );

        } elseif ( isset( $_POST['section'] ) && $_POST['section'] == 'leverage_subscribe' ) {  
            $source             = 'Subscribe Form';                  
            $field_send_options = 'subscribe_sending_options';
            $field_recipient    = 'subscribe_email_recipient';
            $field_webhook_url  = 'subscribe_webhook_url';
            $wpnonce            = 'leverage_subscribe_wpnonce';

            $subject_text    = get_field( 'subscribe_subject_message', 'option' );
            $heading_text    = get_field( 'subscribe_heading_message', 'option' );
            $success_text    = get_field( 'subscribe_success_message', 'option' );
            $validation_text = get_field( 'subscribe_validation_message', 'option' );
            $error_text      = get_field( 'subscribe_error_message', 'option' );
        }

        if ( get_field( $field_recipient, 'option' ) ) {
            $recipient = get_field( $field_recipient, 'option' );
        } else {
            $recipient = get_option( 'admin_email' );
        }
    
        if( isset( $_POST['email'] ) ) {
            $from = sanitize_email( $_POST['email'] );
        } else {
            $from = null;
        }

        if( isset( $_POST['step'] ) ) {
            $step = $_POST['step'];
        } else {
            $step = 'send';
        }

        $to = $recipient;

        if ( $subject_text ) {
            $subject = leverage_translate( $subject_text );
        } else {
            $subject = __( 'New contact in ', 'leverage-extra' ) . get_bloginfo( 'name' );
        }

        if ( $heading_text ) {
            $heading_message = leverage_translate( $heading_text );
        } else {
            $heading_message = __( 'New contact in ', 'leverage-extra' ) . get_bloginfo( 'name' );
        }

        if ( $success_text ) {
            $success_message = leverage_translate( $success_text );
        } else {
            $success_message = __( 'Your message was sent successful. Thanks.', 'leverage-extra' );
        }

        if ( $validation_text ) {
            $validation_message = leverage_translate( $validation_text );
        } else {
            $validation_message = __( 'Validation errors occurred. Please confirm the fields and submit it again.', 'leverage-extra' );
        }

        if ( $error_text ) {
            $error_message = leverage_translate( $error_text );
        } else {
            $error_message =  __( 'Sorry. We were unable to send your message.', 'leverage-extra' );
        }

        $enable_recaptcha = get_field( 'recaptcha', 'option' );

        if ( isset( $enable_recaptcha ) && $enable_recaptcha['enable_recaptcha'] ) {

            if ( ! empty( $reCAPTCHA['success'] ) ) {
                $errCaptcha = '';

            } else {
                $errCaptcha = true;
            }
         
        } else {
            $errCaptcha = '';            
        }
    
        $errFields = array();

        foreach( $_POST as $key => $value ) {
            if ( $key != 'action' && $key != 'section' && $key != 'reCAPTCHA' ) {

                if ( $key == 'email' ) {
                    $validation = filter_var( $_POST[$key], FILTER_VALIDATE_EMAIL );
                } else {                
                    $validation = ! empty( $_POST[$key] );
                }
                
                if ( ! $validation ) {
                    $errFields[$key] = true;
                } 
            }
        }
    
        if ( empty( $errCaptcha ) && count( $errFields ) === 0 && $step === 'send' ) {
            
            $header  = __( 'From ', 'leverage-extra' ) . $from . " <" . $from . ">" . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
    
            // Main
            $body  = '<table style="min-width: 600px; padding: 35px; background-color: #f5f5f5"; font-family: Roboto, sans-serif; font-size: 15px; text-align: left; border-radius: 4px>';
            $body .= '<tr><th style="padding-bottom: 15px; font-size: 20px; font-weight: 600; text-align: left; color: #1E50BC">'.$heading_message.'</th></tr>';
            $body .= '<tr></td>';

            foreach( $_POST as $key => $value ) {
                if ( $key != 'action' && $key != 'section' && $key != 'reCAPTCHA' && $key != '_wp_http_referer' && $key != $wpnonce ) {
                    $body .= '<p style="font-size: 15px"><b>' . str_replace( '-', ' ', ucfirst( $key ) ) . '</b>: ' . nl2br( $value ) . '</p>';
                }
            }

            $body .= '</td></tr>';        
            $body .= '</table>';
            
            // Info
            $body  .= '<table style="min-width: 600px; padding: 35px; background-color: #e5e5e5"; font-family: Roboto, sans-serif; font-size: 15px; text-align: left; border-radius: 4px>';
            $body .= '<tr></td>';
            $body .= '<p style="font-size: 13px">This email was sent from the <b>'.$source.'</b> at <b>'.get_bloginfo( 'name' ).'</b>.</p>';
            $body .= '</td></tr>';        
            $body .= '</table>';

            $mail = false;
            if ( get_field( $field_send_options, 'option' ) == 'Email Recipient' ) {
    
                $mail = wp_mail( $to, $subject, $body, $header );

            } else {

                if ( get_field( $field_webhook_url, 'option' ) ) {
                    $webhook = get_field( $field_webhook_url, 'option' );
                } else {
                    $webhook = null;
                }

                $webhook_body = array();
                foreach( $_POST as $key => $value ) {

                    $webhook_data = array(
                        'key' => sanitize_text_field( $key ),
                        'value' => $value
                    );

                    array_push( $webhook_body, $webhook_data );
                }

                $webhook_args = array(
                    'method'      => 'POST',
                    'timeout'     => 60,
                    'sslverify'   => false,
                    'headers'     => array(
                        'Content-Type'  => 'application/json',
                    ),
                    'body'        => json_encode( $webhook_body )
                );

                $webhook_request = wp_remote_post( $webhook, $webhook_args );

                if ( is_wp_error( $webhook_request ) || wp_remote_retrieve_response_code( $webhook_request ) != 200 ) {
                    error_log( print_r( get_field( $field_send_options, 'option' ), true ) );
                } else {
                    $mail = true; 
                }

                $webhook_response = wp_remote_retrieve_body( $webhook_request );                
            }
    
            if ( $mail ) {
                $response = array(
                    'status'  => 'success',
                    'info'    => $success_message
                );
            
                print_r( json_encode( $response ) );
    
            } else {
                $response = array(
                    'status' => 'fail',
                    'info'   => $error_message
                );
            
                print_r( json_encode( $response ) );
            }
    
        } else {
    
            $response = array(
                'status'  => 'invalid',
                'info'    => $validation_message,
                'captcha' => $errCaptcha,
                'fields'  => $errFields,
                'errors'  => count( $errFields )
            );
    
            print_r( json_encode( $response ) );
        }
    }

    exit;
} 

add_action( 'wp_ajax_leverage_contact_form', 'leverage_handle_ajax_request' );
add_action( 'wp_ajax_nopriv_leverage_contact_form', 'leverage_handle_ajax_request' );