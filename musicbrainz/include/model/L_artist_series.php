<?php
require_once "DBObject.php";

/********************************************
 * L_artist_series represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class L_artist_series extends DBObject
{    
    public $id=0;
    public $link=0;
    public $entity0=0;
    public $entity1=0;
    public $edits_pending=0;
    public $last_updated="";
    public $link_order=0;
    public $entity0_credit="";
    public $entity1_credit="";



    /*****************************************************
     * Returns an HTTP parameter list for L_artist_series object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="link=".$this->link."&";
        $b.="entity0=".$this->entity0."&";
        $b.="entity1=".$this->entity1."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="link_order=".$this->link_order."&";
        $b.="entity0_credit=".$this->entity0_credit."&";
        $b.="entity1_credit=".$this->entity1_credit."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the L_artist_series object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a L_artist_series from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function L_artist_series($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->link= $json['link'];
        $this->entity0= $json['entity0'];
        $this->entity1= $json['entity1'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->link_order= $json['link_order'];
        $this->entity0_credit= $json['entity0_credit'];
        $this->entity1_credit= $json['entity1_credit'];

        }
    }
}

?>
