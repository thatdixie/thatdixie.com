<?php
require_once "DBObject.php";

/********************************************
 * Alternative_release represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Alternative_release extends DBObject
{    
    public $id=0;
    public $gid="";
    public $release=0;
    public $name="";
    public $artist_credit=0;
    public $type=0;
    public $language=0;
    public $script=0;
    public $comment="";



    /*****************************************************
     * Returns an HTTP parameter list for Alternative_release object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="release=".$this->release."&";
        $b.="name=".$this->name."&";
        $b.="artist_credit=".$this->artist_credit."&";
        $b.="type=".$this->type."&";
        $b.="language=".$this->language."&";
        $b.="script=".$this->script."&";
        $b.="comment=".$this->comment."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Alternative_release object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Alternative_release from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Alternative_release($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->gid= $json['gid'];
        $this->release= $json['release'];
        $this->name= $json['name'];
        $this->artist_credit= $json['artist_credit'];
        $this->type= $json['type'];
        $this->language= $json['language'];
        $this->script= $json['script'];
        $this->comment= $json['comment'];

        }
    }
}

?>
