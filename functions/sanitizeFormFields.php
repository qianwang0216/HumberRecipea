<?php

function sanitizeFormFields($formFieldsArray) {
    $sanitizedFormFieldsArray = array();
    
    foreach ($formFieldsArray as $key => $value) {        
        $sanitizedFormFieldsArray[$key] = sanitizeSingleFormField($value);
    }
    return $sanitizedFormFieldsArray;
    
}

function sanitizeSingleFormField($passedFormFieldValue) {
    $sanitizedFormField = htmlentities(sanitizeString($passedFormFieldValue));
    return $sanitizedFormField;
}

function sanitizeString($formFieldString) {
    if (get_magic_quotes_gpc()) {
        $formFieldString = stripcslashes($formFieldString);                   
    }
    return mysql_escape_string($formFieldString);
}

function escapeCharacters($passedArray)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a", "<", ">");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z", "&lt;", "&gt;");
    
    $sanitizedArray = array();
    $sanitizedArray[] = 'an array with santized form field values';
    
    foreach($passedArray as $arrayElement)
    {
    $sanitizedArray[] = str_replace($search, $replace, $arrayElement);
    }
      
     return $sanitizedArray;
}
