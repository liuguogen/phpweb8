<?php
class Base_model extends CI_Model
{
	




	/**
	**增加数据
	**/
	public function insert($table,$data) {
		return $this->db->insert($table,$data);
	}

	/**
	*删除数据
	**/
	public function delete($table,$filter) {
		return $this->db->delete($table,$filter);
	}
	/**
	**更新数据
	**/
	public function update($table,$data,$filter=array()) {
		return $this->db->update($table,$data,$filter);
	}
	/**
	**获取单条数据
	**/	
	public function getRow($fildes='*',$table,$filter=array(),$limit=0,$offset=-1,$orderBy="") {
		$data=$this->getList($fildes,$table,$filter,$limit,$offset,$orderBy);
		return !empty($data) ? $data[0] :array();
	}

	/**
	**获取多条数据
	**@fildes  字段
	**@table 数据表
	**@filter 搜索条件 
	**@limit offset 分页
	**@orderBy 排序
	**/	

	public function getList($fildes='*',$table,$filter=array(),$limit=0,$offset=-1,$orderBy="") {
		if(!$table)return false;
		$where="1=1";
		if(!empty($filter)) {
			// foreach ($where as $key => $value) {
			// 	$whereStr.=" AND {$key} = '{$value}'";
			// }
			$where.=$this->__filter($filter);
		}
		$sql="SELECT {$fildes} FROM `{$table}` WHERE {$where}";
		
		if($orderBy) {
			$sql.=" ORDER BY {$orderBy}";
		}
		$rRow=$this->db->query($sql);

		$data=$rRow->result_array()? $rRow->result_array():array();
		return $data;
		
	}
	/**
	** array('id|in'=>array(),'name|like'=>'test','id|notin'=>array())
	**
	**filter 搜索条件 array
	**/
	private function __filter($filter) {
		if(!is_array($filter)) return false;
		$where='';
		foreach ($filter as $key => $value) {
			$k=explode("|",$key);
			
			if((isset($k[1]) && strtolower($k[1])=='in') || is_array($value)) {
				//in
				$where.=" AND {$k[0]} {$k[1]} (".implode(",",$value).")";
			}elseif(isset($k[1]) && strtolower($k[1])=='like') {
				//like 
				$where.=" AND {$k[0]} {$k[1]} '%{$value}%'";
			}elseif ((isset($k[1]) && strtolower($k[1])=='notin') || is_array($value)) {
				# notin
				$where.=" AND {$k[0]} {$k[1]} (".implode(",",$value).")";
			}else {
				$where.=" AND {$key}='{$value}'";
			}
		}
		return $where;
	}

	/**
	**获取数据总数
	**/

	public function getCount($table,$filter=array()) {
		$where="1=1";
		if(!empty($filter)) {
			// foreach ($where as $key => $value) {
			// 	$whereStr.= " AND {$key}= '{$value}'";
			// }
			$where.=$this->__filter($filter);
		}
		$sql="SELECT  *  FROM `{$table}` WHERE {$where}";
		$rRow=$this->db->query($sql);
		
		return $rRow->num_rows() ? $rRow->num_rows() : 0;
	}
	/**
	**query 执行sql
	**sign false 代表 多条 true 代表单条
	**/

	public function query($sql,$sign=true) {
		if(!$sql) return false;
		$rRow=$this->db->query($sql);
		if(!$sign) {
			return $rRow->result_array() ? $rRow->result_array() :array();
		}else {
			return $rRow->row_array() ? $rRow->row_array() :array();
		}
	}
} 
?>