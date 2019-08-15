<?php
require_once "MusicbrainzDB.php";
require      "Area_alias.php";

/********************************************************************
 * Area_aliasModel inherits MusicbrainzDB and provides functions to
 * map Area_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Area_alias by id
     *
     * @return area_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "area,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      		               
	       "FROM area_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Area_alias"));
    }

    /*********************************************************
     * Insert a new Area_alias into musicbrainz database
     *
     * @param $area_alias
     * @return n/a
     *********************************************************
     */
    public function insert($area_alias)
    {
        $query="INSERT INTO area_alias ( ".
	              "id,".
                      "area,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$area_alias->area." ,".
                      "'".$this->sqlSafe($area_alias->name)."',".
                      "'".$this->sqlSafe($area_alias->locale)."',".
                      " ".$area_alias->edits_pending." ,".
                      "'".$this->sqlSafe($area_alias->last_updated)."',".
                      " ".$area_alias->type." ,".
                      "'".$this->sqlSafe($area_alias->sort_name)."',".
                      " ".$area_alias->begin_date_year." ,".
                      " ".$area_alias->begin_date_month." ,".
                      " ".$area_alias->begin_date_day." ,".
                      " ".$area_alias->end_date_year." ,".
                      " ".$area_alias->end_date_month." ,".
                      " ".$area_alias->end_date_day." ,".
                      "'".$this->sqlSafe($area_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($area_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Area_alias into musicbrainz database
     * and return a Area_alias with new autoincrement
     * primary key
     *
     * @param  $area_alias
     * @return $area_alias
     *********************************************************
     */
    public function insert2($area_alias)
    {
        $query="INSERT INTO area_alias ( ".
	              "id,".
                      "area,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$area_alias->area." ,".
                      "'".$this->sqlSafe($area_alias->name)."',".
                      "'".$this->sqlSafe($area_alias->locale)."',".
                      " ".$area_alias->edits_pending." ,".
                      "'".$this->sqlSafe($area_alias->last_updated)."',".
                      " ".$area_alias->type." ,".
                      "'".$this->sqlSafe($area_alias->sort_name)."',".
                      " ".$area_alias->begin_date_year." ,".
                      " ".$area_alias->begin_date_month." ,".
                      " ".$area_alias->begin_date_day." ,".
                      " ".$area_alias->end_date_year." ,".
                      " ".$area_alias->end_date_month." ,".
                      " ".$area_alias->end_date_day." ,".
                      "'".$this->sqlSafe($area_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($area_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $area_alias->id = $id;
	    return($area_alias);	
    }


    /*********************************************************
     * Update a Area_alias in musicbrainz database
     *
     * @param $area_alias
     * @return n/a
     *********************************************************
     */
    public function update($area_alias)
    {
        $query="UPDATE  area_alias ".
	          "SET ".
                      "id= ".$area_alias->id." ,".
                      "area= ".$area_alias->area." ,".
                      "name='".$this->sqlSafe($area_alias->name)."',".
                      "locale='".$this->sqlSafe($area_alias->locale)."',".
                      "edits_pending= ".$area_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($area_alias->last_updated)."',".
                      "type= ".$area_alias->type." ,".
                      "sort_name='".$this->sqlSafe($area_alias->sort_name)."',".
                      "begin_date_year= ".$area_alias->begin_date_year." ,".
                      "begin_date_month= ".$area_alias->begin_date_month." ,".
                      "begin_date_day= ".$area_alias->begin_date_day." ,".
                      "end_date_year= ".$area_alias->end_date_year." ,".
                      "end_date_month= ".$area_alias->end_date_month." ,".
                      "end_date_day= ".$area_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($area_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($area_alias->ended)."' ".                      
	          "WHERE id=".$area_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Area_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM area_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>