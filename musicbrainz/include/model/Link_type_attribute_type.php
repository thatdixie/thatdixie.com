<?php
require_once "DBObject.php";

/********************************************
 * Link_type_attribute_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link_type_attribute_type extends DBObject
{    
    public $link_type=0;
    public $attribute_type=0;
    public $min=0;
    public $max=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Link_type_attribute_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="link_type=".$this->link_type."&";
        $b.="attribute_type=".$this->attribute_type."&";
        $b.="min=".$this->min."&";
        $b.="max=".$this->max."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link_type_attribute_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link_type_attribute_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link_type_attribute_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->link_type= $json['link_type'];
        $this->attribute_type= $json['attribute_type'];
        $this->min= $json['min'];
        $this->max= $json['max'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
