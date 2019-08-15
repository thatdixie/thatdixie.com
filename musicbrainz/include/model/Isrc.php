<?php
require_once "DBObject.php";

/********************************************
 * Isrc represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Isrc extends DBObject
{    
    public $id=0;
    public $recording=0;
    public $isrc="";
    public $source=0;
    public $edits_pending=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Isrc object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="recording=".$this->recording."&";
        $b.="isrc=".$this->isrc."&";
        $b.="source=".$this->source."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Isrc object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Isrc from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Isrc($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->recording= $json['recording'];
        $this->isrc= $json['isrc'];
        $this->source= $json['source'];
        $this->edits_pending= $json['edits_pending'];
        $this->created= $json['created'];

        }
    }
}

?>
