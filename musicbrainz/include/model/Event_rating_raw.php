<?php
require_once "DBObject.php";

/********************************************
 * Event_rating_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Event_rating_raw extends DBObject
{    
    public $event=0;
    public $editor=0;
    public $rating=0;



    /*****************************************************
     * Returns an HTTP parameter list for Event_rating_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="event=".$this->event."&";
        $b.="editor=".$this->editor."&";
        $b.="rating=".$this->rating."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Event_rating_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Event_rating_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Event_rating_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->event= $json['event'];
        $this->editor= $json['editor'];
        $this->rating= $json['rating'];

        }
    }
}

?>
