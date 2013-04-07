<?php 
class upImages { 
	public $annexFolder = "annex";//附件存放点，默认为：annex 
	public $smallFolder = "smallimg";//缩略图存放路径，注：必须是放在 $annexFolder下的子目录，默认为：smallimg 
	public $markFolder = "mark";//水印图片存放处 
	public $upFileType = "jpg gif png";//上传的类型，默认为：jpg gif png rar zip 
	public $upFileMax = 1024;//上传大小限制，单位是“KB”，默认为：1024KB 
	public $fontType;//字体 
	public $maxWidth = 500; //图片最大宽度 
	public $maxHeight = 600; //图片最大高度 
	function upImages($annexFolder,$smallFolder,$fontFolder) { 
		$this->annexFolder = $annexFolder; 
		$this->smallFolder = $smallFolder; 
		$this->fontType = $fontFolder; 
	} 
	function upLoad($inputName) { 
		$imageName = time();//设定当前时间为图片名称 
		if(@empty($_FILES[$inputName]["name"])) die("<script>alert('没有上传图片信息，请确认');location.href='../login/up.php';</script>"); 
		$name = explode(".",$_FILES[$inputName]["name"]);//将上传前的文件以“.”分开取得文件类型 
		$imgCount = count($name);//获得截取的数量 
		$imgType = $name[$imgCount-1];//取得文件的类型 
		if(strpos($this->upFileType,$imgType) === false) die("<script>alert('上传文件类型仅支持".$this->upFileType."不支持".$imgType."');location.href='../login/up.php';</script>"); 
		$photo = $imageName.".".$imgType;//写入数据库的文件名 
		$uploadFile = $this->annexFolder."/".$photo;//上传后的文件名称 
		$upFileok = move_uploaded_file($_FILES[$inputName]["tmp_name"],$uploadFile); 
		if($upFileok) { 
			$imgSize = $_FILES[$inputName]["size"]; 
			$kSize = round($imgSize/1024); 
			if($kSize > ($this->upFileMax*1024)) { 
				@unlink($uploadFile); 
				die(error("上传文件超过 ".$this->upFileMax."KB")); 
			} 
		} else { 
			
			die("<script>alert('上传图片失败，请确认你的上传文件不超过 $upFileMax KB 或上传时间超时');location.href='../login/up.php';</script>"); 
		} 
		return $photo; 
	} 
	function getInfo($photo) { 
		$photo = $this->annexFolder."/".$photo; 
		$imageInfo = getimagesize($photo); 
		$imgInfo["width"] = $imageInfo[0]; 
		$imgInfo["height"] = $imageInfo[1]; 
		$imgInfo["type"] = $imageInfo[2]; 
		$imgInfo["name"] = basename($photo); 
		return $imgInfo; 
	} 
	function smallImg($photo,$width=128,$height=128) { 
		$imgInfo = $this->getInfo($photo); 
		$photo = $this->annexFolder."/".$photo;//获得图片源 
		$newName = substr($imgInfo["name"],0,strrpos($imgInfo["name"], "."))."_thumb.jpg";//新图片名称 
		if($imgInfo["type"] == 1) { 
			$img = imagecreatefromgif($photo); 
		} elseif($imgInfo["type"] == 2) { 
			$img = imagecreatefromjpeg($photo); 
		} elseif($imgInfo["type"] == 3) { 
			$img = imagecreatefrompng($photo); 
		} else { 
			$img = ""; 
		} 
		if(empty($img)) return False; 
		$width = ($width > $imgInfo["width"]) ? $imgInfo["width"] : $width; 
		$height = ($height > $imgInfo["height"]) ? $imgInfo["height"] : $height; 
		$srcW = $imgInfo["width"]; 
		$srcH = $imgInfo["height"]; 
		if ($srcW * $width > $srcH * $height) { 
			$height = round($srcH * $width / $srcW); 
		} else { 
			$width = round($srcW * $height / $srcH); 
		} 
		if (function_exists("imagecreatetruecolor")) { 
			$newImg = imagecreatetruecolor($width, $height); 
			ImageCopyResampled($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]); 
		} else { 
			$newImg = imagecreate($width, $height); 
			ImageCopyResized($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]); 
		} 
		if ($this->toFile) { 
			if (file_exists($this->annexFolder."/".$this->smallFolder."/".$newName)) @unlink($this->annexFolder."/".$this->smallFolder."/".$newName); 
			ImageJPEG($newImg,$this->annexFolder."/".$this->smallFolder."/".$newName); 
			return $this->annexFolder."/".$this->smallFolder."/".$newName; 
		} else { 
			ImageJPEG($newImg); 
		} 
		ImageDestroy($newImg); 
		ImageDestroy($img); 
		return $newName; 
	} 
	function waterMark($photo,$text,$logoImg) { 
		$imgInfo = $this->getInfo($photo); 
		$photo = $this->annexFolder."/".$photo; 
		$newName = substr($imgInfo["name"], 0, strrpos($imgInfo["name"], ".")) . "_mark.jpg"; 
		switch ($imgInfo["type"]) { 
			case 1: 
			$img = imagecreatefromgif($photo); 
			break; 
			case 2: 
			$img = imagecreatefromjpeg($photo); 
			break; 
			case 3: 
			$img = imagecreatefrompng($photo); 
			break; 
			default: 
			return False; 
		} 
		if (empty($img)) return False; 
		$width = ($this->maxWidth > $imgInfo["width"]) ? $imgInfo["width"] : $this->maxWidth; 
		$height = ($this->maxHeight > $imgInfo["height"]) ? $imgInfo["height"] : $this->maxHeight; 
		$srcW = $imgInfo["width"]; 
		$srcH = $imgInfo["height"]; 
		if ($srcW * $width > $srcH * $height) { 
			$height = round($srcH * $width / $srcW); 
		} else { 
			$width = round($srcW * $height / $srcH); 
		} 
		if (function_exists("imagecreatetruecolor")) { 
			$newImg = imagecreatetruecolor($width, $height); 
			ImageCopyResampled($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]); 
		} else { 
			$newImg = imagecreate($width, $height); 
			ImageCopyResized($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]); 
		} 
		$white = imageColorAllocate($newImg, 255, 255, 255); 
		$black = imageColorAllocate($newImg, 0, 0, 0); 
		//$alpha = imageColorAllocateAlpha($newImg, 230, 230, 230, 40); 
		//ImageFilledRectangle($newImg, 0, $height-26, $width, $height, $alpha); 
		//ImageFilledRectangle($newImg, 13, $height-20, 15, $height-7, $black); 
		$str=iconv("GBK", "UTF-8", $text[0]);
		imagettftext($newImg, 16, 0, 20, $height-14, $black, $this->fontType, $str); //文字水印
		if($logoImg!=""){
			$logoImg=imagecreatefrompng($logoImg);
			$intx2=imagesx($logoImg);
			$inty2=imagesy($logoImg);
			imagecopy($newImg, $logoImg, $width-200, $height-100, 0, 0, $intx2, $inty2);
		}
		
		if($this->toFile) { 
			if (file_exists($this->annexFolder."/".$this->markFolder."/".$newName)) @unlink($this->annexFolder."/".$this->markFolder."/".$newName); 
			ImageJPEG($newImg,$this->annexFolder."/".$this->markFolder."/".$newName); 
			return $this->annexFolder."/".$this->markFolder."/".$newName; 
		} else { 
			ImageJPEG($newImg); 
		} 
		ImageDestroy($newImg); 
		ImageDestroy($img); 
		return $newName; 
	} 
} 
?> 