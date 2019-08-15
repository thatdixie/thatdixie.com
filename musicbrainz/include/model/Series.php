<?php
require_once "DBObject.php";

/********************************************
 * Series represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Series extends DBObject
{    
    public $id=0;
    public $gid="";
    public $name="";
    public $comment="";
    public $type=0;
    public $ordering_attribute=0;
    public $ordering_type=0;
    public $edits_pending=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Series object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="name=".$this->name."&";
        $b.="comment=".$this->comment."&";
        $b.="type=".$this->type."&";
        $b.="ordering_attribute=".$this->ordering_attribute."&";
        $b.="ordering_type=".$this->ordering_type."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Series object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Series from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Series($jsonString='')
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
        $this->name= $json['name'];
        $this->comment= $json['comment'];
        $this->type= $json['type'];
        $this->ordering_attribute= $json['ordering_attribute'];
        $this->ordering_type= $json['ordering_type'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
