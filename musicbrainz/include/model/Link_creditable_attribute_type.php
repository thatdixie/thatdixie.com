<?php
require_once "DBObject.php";

/********************************************
 * Link_creditable_attribute_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link_creditable_attribute_type extends DBObject
{    
    public $attribute_type=0;



    /*****************************************************
     * Returns an HTTP parameter list for Link_creditable_attribute_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="attribute_type=".$this->attribute_type."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link_creditable_attribute_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link_creditable_attribute_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link_creditable_attribute_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->attribute_type= $json['attribute_type'];

        }
    }
}

?>
