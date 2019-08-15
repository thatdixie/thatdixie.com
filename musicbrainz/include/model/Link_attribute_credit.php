<?php
require_once "DBObject.php";

/********************************************
 * Link_attribute_credit represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link_attribute_credit extends DBObject
{    
    public $link=0;
    public $attribute_type=0;
    public $credited_as="";



    /*****************************************************
     * Returns an HTTP parameter list for Link_attribute_credit object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="link=".$this->link."&";
        $b.="attribute_type=".$this->attribute_type."&";
        $b.="credited_as=".$this->credited_as."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link_attribute_credit object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link_attribute_credit from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link_attribute_credit($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->link= $json['link'];
        $this->attribute_type= $json['attribute_type'];
        $this->credited_as= $json['credited_as'];

        }
    }
}

?>
