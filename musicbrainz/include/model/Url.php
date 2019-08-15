<?php
require_once "DBObject.php";

/********************************************
 * Url represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Url extends DBObject
{    
    public $id=0;
    public $gid="";
    public $url="";
    public $edits_pending=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Url object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="url=".$this->url."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Url object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Url from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Url($jsonString='')
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
        $this->url= $json['url'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
