<?php
require_once "DBObject.php";

/********************************************
 * Alternative_track represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Alternative_track extends DBObject
{    
    public $id=0;
    public $name="";
    public $artist_credit=0;
    public $ref_count=0;



    /*****************************************************
     * Returns an HTTP parameter list for Alternative_track object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="name=".$this->name."&";
        $b.="artist_credit=".$this->artist_credit."&";
        $b.="ref_count=".$this->ref_count."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Alternative_track object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Alternative_track from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Alternative_track($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->name= $json['name'];
        $this->artist_credit= $json['artist_credit'];
        $this->ref_count= $json['ref_count'];

        }
    }
}

?>
