<?php
require_once "DBObject.php";

/********************************************
 * Alternative_medium_track represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Alternative_medium_track extends DBObject
{    
    public $alternative_medium=0;
    public $track=0;
    public $alternative_track=0;



    /*****************************************************
     * Returns an HTTP parameter list for Alternative_medium_track object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="alternative_medium=".$this->alternative_medium."&";
        $b.="track=".$this->track."&";
        $b.="alternative_track=".$this->alternative_track."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Alternative_medium_track object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Alternative_medium_track from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Alternative_medium_track($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->alternative_medium= $json['alternative_medium'];
        $this->track= $json['track'];
        $this->alternative_track= $json['alternative_track'];

        }
    }
}

?>
