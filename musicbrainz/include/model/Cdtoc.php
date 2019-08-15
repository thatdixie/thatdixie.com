<?php
require_once "DBObject.php";

/********************************************
 * Cdtoc represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Cdtoc extends DBObject
{    
    public $id=0;
    public $discid="";
    public $freedb_id="";
    public $track_count=0;
    public $leadout_offset=0;
    public $track_offset="";
    public $degraded="";
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Cdtoc object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="discid=".$this->discid."&";
        $b.="freedb_id=".$this->freedb_id."&";
        $b.="track_count=".$this->track_count."&";
        $b.="leadout_offset=".$this->leadout_offset."&";
        $b.="track_offset=".$this->track_offset."&";
        $b.="degraded=".$this->degraded."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Cdtoc object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Cdtoc from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Cdtoc($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->discid= $json['discid'];
        $this->freedb_id= $json['freedb_id'];
        $this->track_count= $json['track_count'];
        $this->leadout_offset= $json['leadout_offset'];
        $this->track_offset= $json['track_offset'];
        $this->degraded= $json['degraded'];
        $this->created= $json['created'];

        }
    }
}

?>
