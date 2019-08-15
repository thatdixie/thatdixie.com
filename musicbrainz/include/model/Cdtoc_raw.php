<?php
require_once "DBObject.php";

/********************************************
 * Cdtoc_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Cdtoc_raw extends DBObject
{    
    public $id=0;
    public $release=0;
    public $discid="";
    public $track_count=0;
    public $leadout_offset=0;
    public $track_offset="";



    /*****************************************************
     * Returns an HTTP parameter list for Cdtoc_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="release=".$this->release."&";
        $b.="discid=".$this->discid."&";
        $b.="track_count=".$this->track_count."&";
        $b.="leadout_offset=".$this->leadout_offset."&";
        $b.="track_offset=".$this->track_offset."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Cdtoc_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Cdtoc_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Cdtoc_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->release= $json['release'];
        $this->discid= $json['discid'];
        $this->track_count= $json['track_count'];
        $this->leadout_offset= $json['leadout_offset'];
        $this->track_offset= $json['track_offset'];

        }
    }
}

?>
