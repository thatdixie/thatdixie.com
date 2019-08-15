<?php
require_once "DBObject.php";

/********************************************
 * Work_tag_raw represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_tag_raw extends DBObject
{    
    public $work=0;
    public $editor=0;
    public $tag=0;
    public $is_upvote="";



    /*****************************************************
     * Returns an HTTP parameter list for Work_tag_raw object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="work=".$this->work."&";
        $b.="editor=".$this->editor."&";
        $b.="tag=".$this->tag."&";
        $b.="is_upvote=".$this->is_upvote."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_tag_raw object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_tag_raw from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_tag_raw($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->work= $json['work'];
        $this->editor= $json['editor'];
        $this->tag= $json['tag'];
        $this->is_upvote= $json['is_upvote'];

        }
    }
}

?>
