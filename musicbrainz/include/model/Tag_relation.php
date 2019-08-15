<?php
require_once "DBObject.php";

/********************************************
 * Tag_relation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Tag_relation extends DBObject
{    
    public $tag1=0;
    public $tag2=0;
    public $weight=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Tag_relation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="tag1=".$this->tag1."&";
        $b.="tag2=".$this->tag2."&";
        $b.="weight=".$this->weight."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Tag_relation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Tag_relation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Tag_relation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->tag1= $json['tag1'];
        $this->tag2= $json['tag2'];
        $this->weight= $json['weight'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
