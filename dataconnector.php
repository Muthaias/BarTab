<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <me@cp0la.se> wrote this file.  As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return.   Mattias Nyberg
 * ----------------------------------------------------------------------------
 */


/*
 * Data connector
 */

class DataConnector
{
	function __construct($dbh, $table_name)
	{
		$this->dbh = $dbh;
		$this->table_name = $table_name;
		$this->error = array();
	}
	
	public function errors()
	{
		return $this->error;
	}
	
	protected function add_error($error)
	{
		array_push($this->error, $error);
	}
	
	protected function selective_item_update($data, $id)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$query_string = '';
		$query_data = array();
		$first = ' ';
		foreach($data as $key => $item)
		{
			if($item !== NULL)
			{
				$query_string .= $first .$key. '=:' .$key;
				$query_data[$key] = $item;
				$first = ', ';
			}
		}

		$query_data['id'] = $id;
		$stmt = $this->dbh->prepare('UPDATE ' .$this->table_name. ' SET ' .$query_string. ' WHERE id=:id');
		$result = $stmt->execute($query_data);
		if($result)
		{
			$stmt->closeCursor();
			return TRUE;
		}
		return FALSE;
	}
	
	public function get_complete_item($id)
	{
		return $this->get_limited_item($id, '*');
	}
	
	protected function get_limited_item($id, $values, $get_disabled = TRUE)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$disabled_string = $get_disabled ? '' : ' WHERE disabled=FALSE';
		$select_string = is_array($values) ? implode(',', $values) : $values;
		$stmt = $this->dbh->prepare('SELECT' .$select_string. ' FROM ' .$this->table_name. ' WHERE id=:id' .$disabled_string);
		$result = $stmt->execute(array('id'=>$id));
		if($result)
		{
			$news = $stmt->fetch();
			$stmt->closeCursor();
			return $news;
		}
		return FALSE;
	}
	
	protected function connected_or_error()
	{
		if($this->dbh == null)
		{
			throw new Exception('Database not connected.');
			return FALSE;
		}
		return TRUE;
	}
	
	protected function get_limited_list($items, $start, $limit, $get_disabled = TRUE)
	{
		if(!$this->connected_or_error()) return FALSE;
	
		$disabled_string = $get_disabled ? '' : ' WHERE disabled=FALSE';
		$select_string = is_array($items) ? implode(',', $items) : $items;
		$limit_string = ($limit > 0) ? ' LIMIT ' .$start. ',' .$limit : '';
		$stmt = $this->dbh->prepare('SELECT ' .$select_string. ' FROM ' .$this->table_name .$disabled_string. ' ORDER BY id DESC ' .$limit_string);
		$result = $stmt->execute();
		if($result)
		{
			$item = $stmt->fetchAll();
			$stmt->closeCursor();
		
			return $item;
		}
		return FALSE;
	}
	
	public function count_items()
	{
		if(!$this->connected_or_error()) return FALSE;
		
		$stmt = $this->dbh->prepare('SELECT COUNT(*) FROM ' .$this->table_name. ' WHERE disabled=FALSE');
		$result = $stmt->execute();
		if($result !== FALSE)
		{
			$count = $item = $stmt->fetch();
			$stmt->closeCursor();
			return $count[0];
		}
		return FALSE;
	}
}

?>