<?php
require_once "DBObject.php";

/********************************************
 * Edit_note_recipient represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_note_recipient extends DBObject
{    
    public $recipient=0;
    public $edit_note=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_note_recipient object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="recipient=".$this->recipient."&";
        $b.="edit_note=".$this->edit_note."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_note_recipient object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_note_recipient from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_note_recipient($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->recipient= $json['recipient'];
        $this->edit_note= $json['edit_note'];

        }
    }
}

?>
