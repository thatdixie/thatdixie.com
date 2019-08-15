<?php
require_once "DBObject.php";

/********************************************
 * Medium represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Medium extends DBObject
{    
    public $id=0;
    public $release=0;
    public $position=0;
    public $format=0;
    public $name="";
    public $edits_pending=0;
    public $last_updated="";
    public $track_count=0;



    /*****************************************************
     * Returns an HTTP parameter list for Medium object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="release=".$this->release."&";
        $b.="position=".$this->position."&";
        $b.="format=".$this->format."&";
        $b.="name=".$this->name."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="track_count=".$this->track_count."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Medium object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Medium from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Medium($jsonString='')
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
        $this->position= $json['position'];
        $this->format= $json['format'];
        $this->name= $json['name'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->track_count= $json['track_count'];

        }
    }
}

?>
