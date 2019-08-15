<?php
require_once "DBObject.php";

/********************************************
 * Artist_credit represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist_credit extends DBObject
{    
    public $id=0;
    public $name="";
    public $artist_count=0;
    public $ref_count=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Artist_credit object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="name=".$this->name."&";
        $b.="artist_count=".$this->artist_count."&";
        $b.="ref_count=".$this->ref_count."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist_credit object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist_credit from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist_credit($jsonString='')
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
        $this->artist_count= $json['artist_count'];
        $this->ref_count= $json['ref_count'];
        $this->created= $json['created'];

        }
    }
}

?>
