<?php
require_once "DBObject.php";

/********************************************
 * Track_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Track_raw extends DBObject
{    
    public $id=0;
    public $release=0;
    public $title="";
    public $artist="";
    public $sequence=0;



    /*****************************************************
     * Returns an HTTP parameter list for Track_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="release=".$this->release."&";
        $b.="title=".$this->title."&";
        $b.="artist=".$this->artist."&";
        $b.="sequence=".$this->sequence."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Track_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Track_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Track_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->release= $json['release'];
        $this->title= $json['title'];
        $this->artist= $json['artist'];
        $this->sequence= $json['sequence'];

        }
    }
}

?>
