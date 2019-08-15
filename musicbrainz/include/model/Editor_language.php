<?php
require_once "DBObject.php";

/********************************************
 * Editor_language represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_language extends DBObject
{    
    public $editor=0;
    public $language=0;
    public $fluency="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_language object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="editor=".$this->editor."&";
        $b.="language=".$this->language."&";
        $b.="fluency=".$this->fluency."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_language object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_language from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_language($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->editor= $json['editor'];
        $this->language= $json['language'];
        $this->fluency= $json['fluency'];

        }
    }
}

?>
