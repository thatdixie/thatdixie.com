<?php
require_once "DBObject.php";

/********************************************
 * Place_tag represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Place_tag extends DBObject
{    
    public $place=0;
    public $tag=0;
    public $count=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Place_tag object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="place=".$this->place."&";
        $b.="tag=".$this->tag."&";
        $b.="count=".$this->count."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Place_tag object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Place_tag from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Place_tag($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->place= $json['place'];
        $this->tag= $json['tag'];
        $this->count= $json['count'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
