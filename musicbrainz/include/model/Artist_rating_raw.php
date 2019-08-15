<?php
require_once "DBObject.php";

/********************************************
 * Artist_rating_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist_rating_raw extends DBObject
{    
    public $artist=0;
    public $editor=0;
    public $rating=0;



    /*****************************************************
     * Returns an HTTP parameter list for Artist_rating_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="artist=".$this->artist."&";
        $b.="editor=".$this->editor."&";
        $b.="rating=".$this->rating."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist_rating_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist_rating_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist_rating_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->artist= $json['artist'];
        $this->editor= $json['editor'];
        $this->rating= $json['rating'];

        }
    }
}

?>
