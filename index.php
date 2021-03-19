<?php 
/****************************************************************************************************************
							Main Using  Class WindowsFileProperties
							
								Below the prerequises
							See COM Requirements:
								COM functions are only available for the Windows version of PHP.
									.Net support requires PHP 5 and the .Net runtime.
								Enable the module COM and .NET extension in PHP :: extension=php_com_dotnet.dll
							PHP 5 or newer
****************************************************************************************************************/
 require('windowsFileProperties.php');
 
	$path = "D:\\wamp\\www\\windowsFileProperties\\TeamViewer10_Setup_fr.exe"; // For Example

	$objectCom = new windowsFileProperties($path);  // create objet
	
	echo $objectCom->getStdoutHtml(); // Example to display all get() method functions in HTML
	
echo "<br>/*********************Example of Call all functions*************************/<br><br>";
	
				 echo $objectCom->getRealFileName()."<br>";  // File Name
				 echo $objectCom->getRealFileVersion()."<br>"; // File Version
				 echo $objectCom->getRealFileSize()."<br>";   // File Size
				 echo $objectCom->getRealFileType()."<br>";   // File Type
				 echo $objectCom->getRealFileExtension()."<br>"; // File Extension
				 echo $objectCom->getRealFilePath();  // File Path
   
?>
