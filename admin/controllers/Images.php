<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {



	public function uploads()
	{

		
		$callback = $_GET['CKEditorFuncNum'];
		$img	=	$_FILES['upload'];
		if ($img['error']!='0'){
			alert("icon上传失败");
		}
		$extname	=	explode(".",$img['name']);
		$extname	=	end($extname);
		if (!in_array($extname,array("jpg","jpeg","gif","png"))){
			alert("只能上传图片格式");
		}
		
		$rootpath	=	realpath(dirname(__FILE__) . '/../../../').'/uploads/';
		$filepath	=	time().rand(1000,9999).".".$extname;
		if (!is_uploaded_file($img['tmp_name'])){
			alert("数据异常");
		}

		if (!move_uploaded_file($img['tmp_name'],$rootpath.$filepath)){
			alert("上传失败");
		}
		$basehost	=	base_url()."uploads/";

		//ckeditor的回调方法
		echo "<script type=\"text/javascript\">";
		echo "window.parent.CKEDITOR.tools.callFunction(" . $callback . ",'".$basehost.$filepath."','')";
		echo "</script>";
	}

	/**
	 * 
	 * 图片上传
	 * Enter description here ...
	 */
	public function upload(){
		$filename=date("Y-m-d",time());

		if(!file_exists('../uploads/'.$filename)){
			//var_export('ff');exit;
			mkdir('../uploads/'.$filename,0777);
		}
		$targetFolder= '/uploads/'.$filename;
		$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYX";
			$tempFile = $_FILES['file']['tmp_name'];
			$targetPath = realpath(dirname(__FILE__) . '/../../'). $targetFolder;
			$newname=substr(strrchr($_FILES['file']['name'],"."),0);
			//这种方法获取的是图片名称的所有名字进行加密
			//$new_name=md5($_FILES['fileField']['name']).$newname;
			//这一种方法是获取图片名称不加后缀
			//$exName=explode(".",$_FILES['fileField']['name']);
			$new_name=substr(str_shuffle($str),0,10).$newname;
			$targetFile = rtrim($targetPath,'/') . '/' .$new_name;
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($targetFile);
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				$new_filename=$targetFolder."/".$new_name;
				echo $new_filename;
			} else {
				echo 'Invalid file type.';
			}
	
	}
}
?>