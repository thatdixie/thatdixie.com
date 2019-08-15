<?php
require_once "DBObject.php";

/********************************************
 * Recording represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Recording extends DBObject
{    
    public $id=0;
    public $gid="";
    public $name="";
    public $artist_credit=0;
    public $length=0;
    public $comment="";
    public $edits_pending=0;
    public $last_updated="";
    public $video="";



    /*****************************************************
     * Returns an HTTP parameter list for Recording object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="name=".$this->name."&";
        $b.="artist_credit=".$this->artist_credit."&";
        $b.="length=".$this->length."&";
        $b.="comment=".$this->comment."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="video=".$this->video."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Recording object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Recording from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Recording($jsonString='')
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
        $this->name= $json['name'];
        $this->artist_credit= $json['artist_credit'];
        $this->length= $json['length'];
        $this->comment= $json['comment'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->video= $json['video'];

        }
    }
}

?>
