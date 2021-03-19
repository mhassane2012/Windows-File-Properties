<?php
/**
 * A simple class php to show Windows File Properties
 *
 * Get :: File properties (Name,Version,Size,Type,Extension,Path)
 * 
 * Before used this class, below the prerequises 
 * 
 *  See COM Requirements:
 *  	COM functions are only available for the Windows version of PHP.
 * 		.Net support requires PHP 5 and the .Net runtime.
 *  	Enable the module COM and .NET extension in PHP :: extension=php_com_dotnet.dll
 *  PHP 5 or newer
 *
 * @author Hassane Moussa <mhassane2012@gmail.com>
 * @From Africa / Niamey-Niger
 * @License GPL
 */
 
 class WindowsFileProperties{  
	
	private $file_path='';
	private $fs='';
	
	/**
    * Constructor of the class   
    */
    public function __construct($file_path)
    {
		$this->file_path = $file_path;
		 
    }
	/**
    *  Print Stdout to html
    */
	function getStdoutHtml()
	{
		$msg= "----PHP--Class--WindowsFileProperties-------------"."<br><br>";
		$msg.= "File Name = ".$this->getRealFileName()."<br>";
		$msg.= "File Version = ".$this->getRealFileVersion()."<br>";
		$msg.= "File Size = ".$this->getRealFileSize()." octets<br>";
		$msg.= "File Type = ".$this->getRealFileType()."<br>";
		$msg.= "File Extension = ".$this->getRealFileExtension()."<br>";
		$msg.= "File Path = ".$this->getRealFilePath()."<br>";
		
		return $msg;
	}
	/**
    *  create File System objet(FSO) instance
    */
	function getFileSystOb()
	{
		return new COM("Scripting.FileSystemObject");
	}
	/**
    *  File Size octets
    */
	function getRealFileSize()
	{
		$this->fs = $this->getFileSystOb();
		return number_format($this->fs->GetFile($this->file_path)->Size,0,""," ");
	}
	/**
    *  File Type
    */
	function getRealFileType()
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($this->file_path)->Type;
	}
	/**
    *  File Name
    */
	function getRealFileName()
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($this->file_path)->Name;
	}
	/**
    *  File Path
    */
	function getRealFilePath()
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($this->file_path)->Path;
	}
	/**
    *  File Extension (.exe,...)
    */
	function getRealFileExtension()
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetExtensionName($this->file_path);
	}
	/**
    *  File Version
    */
	function getRealFileVersion()
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFileVersion(realpath($this->file_path));
	}
 
 
 }
