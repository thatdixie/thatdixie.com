<?php
require_once "DBObject.php";

/********************************************
 * Orderable_link_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Orderable_link_type extends DBObject
{    
    public $link_type=0;
    public $direction=0;



    /*****************************************************
     * Returns an HTTP parameter list for Orderable_link_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="link_type=".$this->link_type."&";
        $b.="direction=".$this->direction."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Orderable_link_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Orderable_link_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Orderable_link_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->link_type= $json['link_type'];
        $this->direction= $json['direction'];

        }
    }
}

?>
