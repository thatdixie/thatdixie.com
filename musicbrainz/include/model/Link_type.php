<?php
require_once "DBObject.php";

/********************************************
 * Link_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link_type extends DBObject
{    
    public $id=0;
    public $parent=0;
    public $child_order=0;
    public $gid="";
    public $entity_type0="";
    public $entity_type1="";
    public $name="";
    public $description="";
    public $link_phrase="";
    public $reverse_link_phrase="";
    public $long_link_phrase="";
    public $priority=0;
    public $last_updated="";
    public $is_deprecated="";
    public $has_dates="";
    public $entity0_cardinality=0;
    public $entity1_cardinality=0;



    /*****************************************************
     * Returns an HTTP parameter list for Link_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="parent=".$this->parent."&";
        $b.="child_order=".$this->child_order."&";
        $b.="gid=".$this->gid."&";
        $b.="entity_type0=".$this->entity_type0."&";
        $b.="entity_type1=".$this->entity_type1."&";
        $b.="name=".$this->name."&";
        $b.="description=".$this->description."&";
        $b.="link_phrase=".$this->link_phrase."&";
        $b.="reverse_link_phrase=".$this->reverse_link_phrase."&";
        $b.="long_link_phrase=".$this->long_link_phrase."&";
        $b.="priority=".$this->priority."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="is_deprecated=".$this->is_deprecated."&";
        $b.="has_dates=".$this->has_dates."&";
        $b.="entity0_cardinality=".$this->entity0_cardinality."&";
        $b.="entity1_cardinality=".$this->entity1_cardinality."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->parent= $json['parent'];
        $this->child_order= $json['child_order'];
        $this->gid= $json['gid'];
        $this->entity_type0= $json['entity_type0'];
        $this->entity_type1= $json['entity_type1'];
        $this->name= $json['name'];
        $this->description= $json['description'];
        $this->link_phrase= $json['link_phrase'];
        $this->reverse_link_phrase= $json['reverse_link_phrase'];
        $this->long_link_phrase= $json['long_link_phrase'];
        $this->priority= $json['priority'];
        $this->last_updated= $json['last_updated'];
        $this->is_deprecated= $json['is_deprecated'];
        $this->has_dates= $json['has_dates'];
        $this->entity0_cardinality= $json['entity0_cardinality'];
        $this->entity1_cardinality= $json['entity1_cardinality'];

        }
    }
}

?>
