<?php
require_once "DBObject.php";

/********************************************
 * Release_tag represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_tag extends DBObject
{    
    public $release=0;
    public $tag=0;
    public $count=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_tag object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="release=".$this->release."&";
        $b.="tag=".$this->tag."&";
        $b.="count=".$this->count."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_tag object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_tag from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_tag($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->release= $json['release'];
        $this->tag= $json['tag'];
        $this->count= $json['count'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
