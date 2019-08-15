<?php
require_once "DBObject.php";

/********************************************
 * Language represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Language extends DBObject
{    
    public $id=0;
    public $iso_code_2t="";
    public $iso_code_2b="";
    public $iso_code_1="";
    public $name="";
    public $frequency=0;
    public $iso_code_3="";



    /*****************************************************
     * Returns an HTTP parameter list for Language object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="iso_code_2t=".$this->iso_code_2t."&";
        $b.="iso_code_2b=".$this->iso_code_2b."&";
        $b.="iso_code_1=".$this->iso_code_1."&";
        $b.="name=".$this->name."&";
        $b.="frequency=".$this->frequency."&";
        $b.="iso_code_3=".$this->iso_code_3."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Language object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Language from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Language($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->iso_code_2t= $json['iso_code_2t'];
        $this->iso_code_2b= $json['iso_code_2b'];
        $this->iso_code_1= $json['iso_code_1'];
        $this->name= $json['name'];
        $this->frequency= $json['frequency'];
        $this->iso_code_3= $json['iso_code_3'];

        }
    }
}

?>
