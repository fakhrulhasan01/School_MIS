<?php

       function MS($data) {
		return mysql_real_escape_string(strip_tags($data));	
	}
   
   function mer($data){
		echo "<p style='color:red; font-size:16px'>{$data}</p>";
	}

	function mss($data){
		echo "<p style='color:green; font-size:16px; float:right'>{$data}</p>";
	}
	
	function Table($data, $url){
	if($data == ""){
	 echo "No Data view to display.";
	 }	
	 else{
	  
	  for($i=0; $i<count($data); $i++){
		 echo "<tr>";
		 
		 for($j=1; $j<count($data[$i]); $j++){
			
			echo "<td>";
			if(
					   	(substr($data[$i][$j], -4) == ".jpg") || 
						(substr($data[$i][$j], -4) == ".png") || 
						(substr($data[$i][$j], -4) == ".gif") ||
						(substr($data[$i][$j], -4) == "jpeg"))
					{
						echo "<img src='images/{$data[$i][$j]}' width='50' />";	
					}
					else if(substr($data[$i][$j], -4) == ".txt")
					{
						FileRead("files/" . $data[$i][$j]);	
					}
					else if($data[$i][$j] == "M"){
					   echo "Male";
					   }
					   
					else if($data[$i][$j] == "F"){
					echo "Female";
					}else if(substr($data[$i][$j], -4) == ".pdf"){
						echo "<a href='largefiles/".$data[$i][$j]."'><img src='img/pdf.jpeg' width='22' height='20'/></a>";
					}else if((substr($data[$i][$j], -4) == ".doc") || (substr($data[$i][$j], -4) == "docx")){
						echo "<a href='largefiles/".$data[$i][$j]."'><img src='img/doc.png' width='22' height='20'/></a>";
					}
					else{
			        echo $data[$i][$j];
					}
			echo "</td>";
			
			}
			if($url == ""){
			 }
			   
			   else if($url=="iqtest"){
			   echo "<td><a title='Edit' href='?t={$url}edit&id={$data[$i][0]}'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?t={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	           }
	           
			   
			   
				 else if($url=="typeteacher"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
			else if($url=="teacheraccountinfo"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
			   
			   else if($url=="earn"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  else if($url=="earntype"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  else if($url=="payorpaidamounttype"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              } 
			   
			   else if($url=="expencetype"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
			   
			   else if($url=="expence"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  
				  else if($url=="expenceforpublishtype"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  
				  else if($url=="expenceforpublish"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  
			   else if($url=="expenceforgardiantarrangementtype"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  
			    else if($url=="expenceforgardiantarrangement"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
				  else if($url=="payableamount"){
			   echo "<td><a title='Edit' href='?ad={$url}edit&id={$data[$i][0]}'><center><img  src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
				 echo "<td><a title='Delete' href='?ad={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	              }
			
			else if($url=="classmaterial"){
			   echo "<td><a href='?t={$url}edit&id={$data[$i][0]}'>Edit</a></td>";
			   echo "<td><a href='?t={$url}delete&id={$data[$i][0]}'>Delete</a></td>";
			}
			
			else if($url=="subjectquestion"){
			   echo "<td><a href='?t={$url}edit&id={$data[$i][0]}'>Edit</a></td>";
			   echo "<td><a href='?t={$url}delete&id={$data[$i][0]}'>Delete</a></td>";
			}
			
			else if($url=="showusermessage"){
			   //echo "<td><a href='?a={$url}confirm&id={$data[$i][0]}'>Approve</a></td>";
			   echo "<td><a href='?a={$url}delete&id={$data[$i][0]}'>Delete</a></td>";
			}
			else{
				 echo "<td><a title='Edit' href='?a={$url}edit&id={$data[$i][0]}'><center><img src='icon-images/edit.jpg'  height='22' width='22'/></center></a></td>";
				 echo "<td><a title='Delete' href='?a={$url}delete&id={$data[$i][0]}'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";

			}
		 echo "</tr>";
		 
		 }
	  }
	}
	
	
	
	function Redirect($data) {
		echo "<script>";
		echo "self.location = '{$data}';";
		echo "</script>";	
	}
	
	
	
	function SelectFunction($data){
		for($i=0; $i < count($data); $i++){
		echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";
		}
	}

  
  
    function SelectedFunction($data, $id)
	{
		for($i = 0; $i < count($data); $i++) {
			if($data[$i][0] == $id){
				echo "<option selected='selected' value='{$data[$i][0]}'>{$data[$i][1]}</option>";	
			}
			else{
				echo "<option value='{$data[$i][0]}'>{$data[$i][1]}</option>";		
			}
		}
	}
	
    function UploadPicture($data) {
		if(($data['name'] != "") && (($data['type'] == "image/jpg") ||
									 ($data['type'] == "image/jpeg") ||
									 ($data['type'] == "image/png") ||
									 ($data['type'] == "image/gif"))) {
			$pic = $data['name'];
			$pic = strtolower(stripslashes($pic));
			if(strlen($pic) > 15) {
				$pic = substr($pic, -15);	
			}
			$pic = rand(1, 999) . time() . $pic;
			$nm = "images/" . $pic;
			copy($data['tmp_name'], $nm);
			return $pic;			
		}
		else {
			$img = "";
			return $img;
		}
		
	}		
	



function UploadDocFile($data) {
		if(($data['name'] != "") && (($data['type'] == "application/msword")
											||
				($data['type']  ==	"application/vnd.openxmlformats-officedocument.wordprocessingml.document")
											||
				($data['type']  ==	"application/octet-stream")
											||
				($data['type'] == "application/pdf")
											||
				($data['type'] == "application/vnd.ms-powerpoint")
											||
				($data['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")				
				)) {
			$pic = $data['name'];
			$pic = strtolower(stripslashes($pic));
			if(strlen($pic) > 15) {
				$pic = substr($pic, -15);	
			}
			$pic = rand(1, 999) . time() . $pic;
			$nm = "largefiles/" . $pic;
			copy($data['tmp_name'], $nm);
			return $pic;			
		}
		else {
			$img = "";
			return $img;
		}
		
	}



	
	
	function CreateFile($data){
		$fn = time() . rand(1, 999999) . ".txt";
		$fd = "files/" . $fn;
		$fh = fopen($fd, 'w');
		$fhh = fwrite($fh, $data);
		fclose($fh);
		return $fn;
	}
	
	function FileRead($data) {
		$fn = fopen($data, 'r');
		$dt = fread($fn, filesize($data));
		fclose($fn);
		echo $dt;
	}
	
	function read_files($file_name, $ln)	{
		$nm = "files/" . $file_name;
		$fh = fopen($nm, "r");
		$dataa = fread($fh, filesize($nm));
		fclose($fh);
		if($ln == "All") {
			echo $dataa;
		}
		else {
			echo substr($dataa, 0, $ln);
		}	
	}

?>