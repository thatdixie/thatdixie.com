<?php
require_once "DBObject.php";

/********************************************
 * Edit_note represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_note extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $edit=0;
    public $text="";
    public $post_time="";



    /*****************************************************
     * Returns an HTTP parameter list for Edit_note object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="edit=".$this->edit."&";
        $b.="text=".$this->text."&";
        $b.="post_time=".$this->post_time."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_note object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_note from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_note($jsonString='')
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
        $this->edit= $json['edit'];
        $this->text= $json['text'];
        $this->post_time= $json['post_time'];

        }
    }
}

?>
