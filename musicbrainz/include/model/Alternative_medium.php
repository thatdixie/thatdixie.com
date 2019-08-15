<?php
require_once "DBObject.php";

/********************************************
 * Alternative_medium represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Alternative_medium extends DBObject
{    
    public $id=0;
    public $medium=0;
    public $alternative_release=0;
    public $name="";



    /*****************************************************
     * Returns an HTTP parameter list for Alternative_medium object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="medium=".$this->medium."&";
        $b.="alternative_release=".$this->alternative_release."&";
        $b.="name=".$this->name."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Alternative_medium object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Alternative_medium from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Alternative_medium($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->medium= $json['medium'];
        $this->alternative_release= $json['alternative_release'];
        $this->name= $json['name'];

        }
    }
}

?>
