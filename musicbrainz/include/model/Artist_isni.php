<?php
require_once "DBObject.php";

/********************************************
 * Artist_isni represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist_isni extends DBObject
{    
    public $artist=0;
    public $isni="";
    public $edits_pending=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Artist_isni object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="artist=".$this->artist."&";
        $b.="isni=".$this->isni."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist_isni object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist_isni from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist_isni($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->artist= $json['artist'];
        $this->isni= $json['isni'];
        $this->edits_pending= $json['edits_pending'];
        $this->created= $json['created'];

        }
    }
}

?>
