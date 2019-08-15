<?php
require_once "DBObject.php";

/********************************************
 * Event_meta represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Event_meta extends DBObject
{    
    public $id=0;
    public $rating=0;
    public $rating_count=0;



    /*****************************************************
     * Returns an HTTP parameter list for Event_meta object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="rating=".$this->rating."&";
        $b.="rating_count=".$this->rating_count."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Event_meta object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Event_meta from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Event_meta($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->rating= $json['rating'];
        $this->rating_count= $json['rating_count'];

        }
    }
}

?>
