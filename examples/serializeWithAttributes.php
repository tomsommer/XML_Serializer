<?PHP
/**
 * XML Serializer example
 *
 * This example demonstrates, how XML_Serializer is able
 * to serialize scalar values as an attribute instead of a nested tag.
 *
 * @author  Stephan Schmidt 
 */

    require_once 'XML/Serializer.php';

    $options = array(
                        "indent"             => "    ",
                        "linebreak"          => "\n",
                        "defaultTagName"     => "unnamedItem",
						"scalarAsAttributes" => true,
                    );
    
    // this is just to get a nested object
    $pearError = PEAR::raiseError('This is just an error object',123);
	
	$value	=	array(
						"foo"	=>	array(
											"argh" => "bar"
										),
						"err"   => $pearError
					);
    
    $serializer = new XML_Serializer($options);
    
    $result = $serializer->serialize($value);
    
    if( $result === true ) {
		$xml = $serializer->getSerializedData();

	    echo	"<pre>";
	    print_r( htmlspecialchars($xml) );
	    echo	"</pre>";
    } else {
		echo	"<pre>";
		print_r($result);
		echo	"</pre>";
	}

?>