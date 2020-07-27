<?php

/***
 * @Descripcion: ajax-functions.php
 * Contiene las diferentes funciones de ajax
 *
 * Estas funciones ajax son utilizadoas tanto en el front-end como en el back-end
 *
 *
 ***/

/*
|-------------------------------------------------------------------------------
| Function Ajax to send email contact
|-------------------------------------------------------------------------------
*/
function SendFormCallback() {

    $formName       = esc_attr( $_POST[ 'name' ] );
    $formEmail      = esc_attr( $_POST[ 'email' ] );
    $formTel        = esc_attr( $_POST[ 'celular' ] );
    $msnContact     = esc_attr( $_POST[ 'mensaje' ] );
    $formNonce      = esc_attr( $_POST[ 'nonceContactForm' ] );
    $msnSubject     = 'Contacto Cooking Food Box: ';
    $sent           = false;

    // Create response object Ajax
    $objLoad = ( object ) array( 'validate' => false );

    if( ! wp_verify_nonce( $formNonce, 'nonce-contact-form' ) ){
        $objLoad -> validate = false;
        $objLoad -> msnError = 'Error Seguridad';
        die( json_encode( $objLoad ) );
    }

    if( !filter_var( $formEmail, FILTER_VALIDATE_EMAIL ) || empty( $formName ) ){
        $objLoad -> validate = false;
        $objLoad -> msnError = 'Error en los datos';
        die( json_encode( $objLoad ) );

    }else{

        $to = array(
                    'cristianrozoa@gmail.com'
                ,   'jiersonj@gmail.com'
                );

        $subject = utf8_decode( $msnSubject . $formName );

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $headers .= 'Return-Path: <' . $to . '>' . "\n";
        $headers .= 'From: Contacto Cooking Food Box <cristianrozoa@gmail.com>' . "\r\n";

        $body = "
            <p>&nbsp;</p>
            <b>Nombre:</b> " . $formName . "<br>
            <b>E-mail:</b> " . $formEmail . "<br>
            <b>Telefono:</b> " . $formTel . "<br>";

        $body .= "<b>Comentario y/o Inquietud:</b> " . $msnContact;

        // Codificamos a caracteres espanioles
        $body = htmlspecialchars_decode( htmlentities( $body, ENT_NOQUOTES, 'UTF-8', false ), ENT_NOQUOTES );

        //Enviamos el correo
        $sent = wp_mail( $to, $subject, $body, $headers );

        //Se envio correctamente el email?
        if( $sent ){
            $objLoad -> validate = true;
        }else{
            $objLoad -> validate = false;
        }
    }

    if( WP_DEBUG ){
        $objLoad -> body        = $body;
        $objLoad -> sent        = $sent;
        $objLoad -> subject     = $subject;
        $objLoad -> formName    = $formName;
        $objLoad -> formEmail   = $formEmail;
        $objLoad -> msnContact  = $msnContact;
        $objLoad -> msnError    = $msnError;
    }

    echo json_encode( $objLoad );
    die( );

}

add_action('wp_ajax_SendForm', 'SendFormCallback');
add_action('wp_ajax_nopriv_SendForm', 'SendFormCallback');

?>