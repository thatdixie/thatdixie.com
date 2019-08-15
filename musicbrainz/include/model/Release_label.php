<?php
require_once "DBObject.php";

/********************************************
 * Release_label represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_label extends DBObject
{    
    public $id=0;
    public $release=0;
    public $label=0;
    public $catalog_number="";
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_label object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="release=".$this->release."&";
        $b.="label=".$this->label."&";
        $b.="catalog_number=".$this->catalog_number."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_label object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_label from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_label($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->release= $json['release'];
        $this->label= $json['label'];
        $this->catalog_number= $json['catalog_number'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
