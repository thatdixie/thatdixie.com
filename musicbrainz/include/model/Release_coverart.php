<?php
require_once "DBObject.php";

/********************************************
 * Release_coverart represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_coverart extends DBObject
{    
    public $id=0;
    public $last_updated="";
    public $cover_art_url="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_coverart object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="cover_art_url=".$this->cover_art_url."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_coverart object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_coverart from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_coverart($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->last_updated= $json['last_updated'];
        $this->cover_art_url= $json['cover_art_url'];

        }
    }
}

?>
