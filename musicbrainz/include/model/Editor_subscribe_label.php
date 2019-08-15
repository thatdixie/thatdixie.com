<?php
require_once "DBObject.php";

/********************************************
 * Editor_subscribe_label represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_subscribe_label extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $label=0;
    public $last_edit_sent=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_subscribe_label object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="label=".$this->label."&";
        $b.="last_edit_sent=".$this->last_edit_sent."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_subscribe_label object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_subscribe_label from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_subscribe_label($jsonString='')
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
        $this->label= $json['label'];
        $this->last_edit_sent= $json['last_edit_sent'];

        }
    }
}

?>
