<?php
require_once "DBObject.php";

/********************************************
 * Script represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Script extends DBObject
{    
    public $id=0;
    public $iso_code="";
    public $iso_number="";
    public $name="";
    public $frequency=0;



    /*****************************************************
     * Returns an HTTP parameter list for Script object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="iso_code=".$this->iso_code."&";
        $b.="iso_number=".$this->iso_number."&";
        $b.="name=".$this->name."&";
        $b.="frequency=".$this->frequency."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Script object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Script from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Script($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->iso_code= $json['iso_code'];
        $this->iso_number= $json['iso_number'];
        $this->name= $json['name'];
        $this->frequency= $json['frequency'];

        }
    }
}

?>
