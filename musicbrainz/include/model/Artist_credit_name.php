<?php
require_once "DBObject.php";

/********************************************
 * Artist_credit_name represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist_credit_name extends DBObject
{    
    public $artist_credit=0;
    public $position=0;
    public $artist=0;
    public $name="";
    public $join_phrase="";



    /*****************************************************
     * Returns an HTTP parameter list for Artist_credit_name object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="artist_credit=".$this->artist_credit."&";
        $b.="position=".$this->position."&";
        $b.="artist=".$this->artist."&";
        $b.="name=".$this->name."&";
        $b.="join_phrase=".$this->join_phrase."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist_credit_name object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist_credit_name from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist_credit_name($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->artist_credit= $json['artist_credit'];
        $this->position= $json['position'];
        $this->artist= $json['artist'];
        $this->name= $json['name'];
        $this->join_phrase= $json['join_phrase'];

        }
    }
}

?>
