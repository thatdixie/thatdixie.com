<?php
require_once "DBObject.php";

/********************************************
 * Release_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_raw extends DBObject
{    
    public $id=0;
    public $title="";
    public $artist="";
    public $added="";
    public $last_modified="";
    public $lookup_count=0;
    public $modify_count=0;
    public $source=0;
    public $barcode="";
    public $comment="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="title=".$this->title."&";
        $b.="artist=".$this->artist."&";
        $b.="added=".$this->added."&";
        $b.="last_modified=".$this->last_modified."&";
        $b.="lookup_count=".$this->lookup_count."&";
        $b.="modify_count=".$this->modify_count."&";
        $b.="source=".$this->source."&";
        $b.="barcode=".$this->barcode."&";
        $b.="comment=".$this->comment."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->title= $json['title'];
        $this->artist= $json['artist'];
        $this->added= $json['added'];
        $this->last_modified= $json['last_modified'];
        $this->lookup_count= $json['lookup_count'];
        $this->modify_count= $json['modify_count'];
        $this->source= $json['source'];
        $this->barcode= $json['barcode'];
        $this->comment= $json['comment'];

        }
    }
}

?>
