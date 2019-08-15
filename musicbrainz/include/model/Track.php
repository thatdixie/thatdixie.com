<?php
require_once "DBObject.php";

/********************************************
 * Track represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Track extends DBObject
{    
    public $id=0;
    public $gid="";
    public $recording=0;
    public $medium=0;
    public $position=0;
    public $number="";
    public $name="";
    public $artist_credit=0;
    public $length=0;
    public $edits_pending=0;
    public $last_updated="";
    public $is_data_track="";



    /*****************************************************
     * Returns an HTTP parameter list for Track object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="recording=".$this->recording."&";
        $b.="medium=".$this->medium."&";
        $b.="position=".$this->position."&";
        $b.="number=".$this->number."&";
        $b.="name=".$this->name."&";
        $b.="artist_credit=".$this->artist_credit."&";
        $b.="length=".$this->length."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="is_data_track=".$this->is_data_track."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Track object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Track from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Track($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->gid= $json['gid'];
        $this->recording= $json['recording'];
        $this->medium= $json['medium'];
        $this->position= $json['position'];
        $this->number= $json['number'];
        $this->name= $json['name'];
        $this->artist_credit= $json['artist_credit'];
        $this->length= $json['length'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->is_data_track= $json['is_data_track'];

        }
    }
}

?>
