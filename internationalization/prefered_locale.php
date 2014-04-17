<?php

/**
 * Facebook Code Samples: Prefered Locale 
 *
 * Detect the user's prefered locale based on HTTP_ACCEPT_LANGUAGE.
 * 
 * Example Code based on CodeIgniter's User Agent Class
 * http://codeigniter.com/user_guide/libraries/user_agent.html 
 * 
 * @package		FacebookCodeSamples
 * @subpackage	Internationalization
 * @author		Stephan Alber
 */
 

function get_languages()
{
    $languages = preg_replace('/(;q=[0-9\.]+)/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])));
    return explode(',', $languages);
}

function accept_lang($lang = 'en')
{
    return (in_array(strtolower($lang), get_languages(), TRUE));
}

function get_prefered_locale()
{
    $my_languages = array(
        'de_DE' => 'de',
        'en_US' => 'en'
    );
    
    foreach ($my_languages as $locale => $lang) {
        if (accept_lang($lang)) {
            return $locale;
        }
    }
    
    return 'en_US';
}


// echo get_prefered_locale();