<?php
require_once "MusicbrainzDB.php";
require      "Release_group_alias.php";

/********************************************************************
 * Release_group_aliasModel inherits MusicbrainzDB and provides functions to
 * map Release_group_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_group_alias by id
     *
     * @return release_group_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release_group,".
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
	       "FROM release_group_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_group_alias"));
    }

    /*********************************************************
     * Insert a new Release_group_alias into musicbrainz database
     *
     * @param $release_group_alias
     * @return n/a
     *********************************************************
     */
    public function insert($release_group_alias)
    {
        $query="INSERT INTO release_group_alias ( ".
	              "id,".
                      "release_group,".
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
                      " ".$release_group_alias->release_group." ,".
                      "'".$this->sqlSafe($release_group_alias->name)."',".
                      "'".$this->sqlSafe($release_group_alias->locale)."',".
                      " ".$release_group_alias->edits_pending." ,".
                      "'".$this->sqlSafe($release_group_alias->last_updated)."',".
                      " ".$release_group_alias->type." ,".
                      "'".$this->sqlSafe($release_group_alias->sort_name)."',".
                      " ".$release_group_alias->begin_date_year." ,".
                      " ".$release_group_alias->begin_date_month." ,".
                      " ".$release_group_alias->begin_date_day." ,".
                      " ".$release_group_alias->end_date_year." ,".
                      " ".$release_group_alias->end_date_month." ,".
                      " ".$release_group_alias->end_date_day." ,".
                      "'".$this->sqlSafe($release_group_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($release_group_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_group_alias into musicbrainz database
     * and return a Release_group_alias with new autoincrement
     * primary key
     *
     * @param  $release_group_alias
     * @return $release_group_alias
     *********************************************************
     */
    public function insert2($release_group_alias)
    {
        $query="INSERT INTO release_group_alias ( ".
	              "id,".
                      "release_group,".
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
                      " ".$release_group_alias->release_group." ,".
                      "'".$this->sqlSafe($release_group_alias->name)."',".
                      "'".$this->sqlSafe($release_group_alias->locale)."',".
                      " ".$release_group_alias->edits_pending." ,".
                      "'".$this->sqlSafe($release_group_alias->last_updated)."',".
                      " ".$release_group_alias->type." ,".
                      "'".$this->sqlSafe($release_group_alias->sort_name)."',".
                      " ".$release_group_alias->begin_date_year." ,".
                      " ".$release_group_alias->begin_date_month." ,".
                      " ".$release_group_alias->begin_date_day." ,".
                      " ".$release_group_alias->end_date_year." ,".
                      " ".$release_group_alias->end_date_month." ,".
                      " ".$release_group_alias->end_date_day." ,".
                      "'".$this->sqlSafe($release_group_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($release_group_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_group_alias->id = $id;
	    return($release_group_alias);	
    }


    /*********************************************************
     * Update a Release_group_alias in musicbrainz database
     *
     * @param $release_group_alias
     * @return n/a
     *********************************************************
     */
    public function update($release_group_alias)
    {
        $query="UPDATE  release_group_alias ".
	          "SET ".
                      "id= ".$release_group_alias->id." ,".
                      "release_group= ".$release_group_alias->release_group." ,".
                      "name='".$this->sqlSafe($release_group_alias->name)."',".
                      "locale='".$this->sqlSafe($release_group_alias->locale)."',".
                      "edits_pending= ".$release_group_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($release_group_alias->last_updated)."',".
                      "type= ".$release_group_alias->type." ,".
                      "sort_name='".$this->sqlSafe($release_group_alias->sort_name)."',".
                      "begin_date_year= ".$release_group_alias->begin_date_year." ,".
                      "begin_date_month= ".$release_group_alias->begin_date_month." ,".
                      "begin_date_day= ".$release_group_alias->begin_date_day." ,".
                      "end_date_year= ".$release_group_alias->end_date_year." ,".
                      "end_date_month= ".$release_group_alias->end_date_month." ,".
                      "end_date_day= ".$release_group_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($release_group_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($release_group_alias->ended)."' ".                      
	          "WHERE id=".$release_group_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_group_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_group_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>