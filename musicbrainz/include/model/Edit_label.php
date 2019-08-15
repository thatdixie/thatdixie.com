<?php
require_once "DBObject.php";

/********************************************
 * Edit_label represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_label extends DBObject
{    
    public $edit=0;
    public $label=0;
    public $status=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_label object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="label=".$this->label."&";
        $b.="status=".$this->status."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_label object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_label from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_label($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->label= $json['label'];
        $this->status= $json['status'];

        }
    }
}

?>
