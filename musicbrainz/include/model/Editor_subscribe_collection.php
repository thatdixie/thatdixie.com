<?php
require_once "DBObject.php";

/********************************************
 * Editor_subscribe_collection represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_subscribe_collection extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $collection=0;
    public $last_edit_sent=0;
    public $available="";
    public $last_seen_name="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_subscribe_collection object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="collection=".$this->collection."&";
        $b.="last_edit_sent=".$this->last_edit_sent."&";
        $b.="available=".$this->available."&";
        $b.="last_seen_name=".$this->last_seen_name."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_subscribe_collection object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_subscribe_collection from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_subscribe_collection($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->editor= $json['editor'];
        $this->collection= $json['collection'];
        $this->last_edit_sent= $json['last_edit_sent'];
        $this->available= $json['available'];
        $this->last_seen_name= $json['last_seen_name'];

        }
    }
}

?>
