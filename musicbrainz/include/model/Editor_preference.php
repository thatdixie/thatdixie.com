<?php
require_once "DBObject.php";

/********************************************
 * Editor_preference represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_preference extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $name="";
    public $value="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_preference object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="name=".$this->name."&";
        $b.="value=".$this->value."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_preference object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_preference from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_preference($jsonString='')
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
        $this->name= $json['name'];
        $this->value= $json['value'];

        }
    }
}

?>
