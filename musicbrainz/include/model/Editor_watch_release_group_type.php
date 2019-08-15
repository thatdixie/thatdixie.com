<?php
require_once "DBObject.php";

/********************************************
 * Editor_watch_release_group_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_watch_release_group_type extends DBObject
{    
    public $editor=0;
    public $release_group_type=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_watch_release_group_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="editor=".$this->editor."&";
        $b.="release_group_type=".$this->release_group_type."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_watch_release_group_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_watch_release_group_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_watch_release_group_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->editor= $json['editor'];
        $this->release_group_type= $json['release_group_type'];

        }
    }
}

?>
