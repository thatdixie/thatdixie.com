<?php
require_once "DBObject.php";

/********************************************
 * Release_meta represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_meta extends DBObject
{    
    public $id=0;
    public $date_added="";
    public $info_url="";
    public $amazon_asin="";
    public $amazon_store="";
    public $cover_art_presence="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_meta object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="date_added=".$this->date_added."&";
        $b.="info_url=".$this->info_url."&";
        $b.="amazon_asin=".$this->amazon_asin."&";
        $b.="amazon_store=".$this->amazon_store."&";
        $b.="cover_art_presence=".$this->cover_art_presence."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_meta object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_meta from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_meta($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->date_added= $json['date_added'];
        $this->info_url= $json['info_url'];
        $this->amazon_asin= $json['amazon_asin'];
        $this->amazon_store= $json['amazon_store'];
        $this->cover_art_presence= $json['cover_art_presence'];

        }
    }
}

?>
