<?php
require_once "DBObject.php";

/********************************************
 * Instrument represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Instrument extends DBObject
{    
    public $id=0;
    public $gid="";
    public $name="";
    public $type=0;
    public $edits_pending=0;
    public $last_updated="";
    public $comment="";
    public $description="";



    /*****************************************************
     * Returns an HTTP parameter list for Instrument object
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
        $b.="type=".$this->type."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="comment=".$this->comment."&";
        $b.="description=".$this->description."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Instrument object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Instrument from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Instrument($jsonString='')
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
        $this->type= $json['type'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->comment= $json['comment'];
        $this->description= $json['description'];

        }
    }
}

?>
