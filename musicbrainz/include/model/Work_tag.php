<?php
require_once "DBObject.php";

/********************************************
 * Work_tag represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_tag extends DBObject
{    
    public $work=0;
    public $tag=0;
    public $count=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Work_tag object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="work=".$this->work."&";
        $b.="tag=".$this->tag."&";
        $b.="count=".$this->count."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_tag object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_tag from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_tag($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->work= $json['work'];
        $this->tag= $json['tag'];
        $this->count= $json['count'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
