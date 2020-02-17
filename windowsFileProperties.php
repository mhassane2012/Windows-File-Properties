<?php
/**
 * A simple class php to show Windows File Properties
 *
 * Get :: File properties (Name,Version,Size,Type,Extension,Path)
 * 
 * Before used this class, below the prerequises 
 * 
 * PHP 5 or newer
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
	  
		print "----PHP--Class--WindowsFileProperties-------------"."<br><br>";
		print "File Name = ".$this->getRealFileName($this->file_path)."<br>";
		print "File Version = ".$this->getRealFileVersion($this->file_path)."<br>";
		print "File Size = ".$this->getRealFileSize($this->file_path)." octets<br>";
		print "File Type = ".$this->getRealFileType($this->file_path)."<br>";
		print "File Extension = ".$this->getRealFileExtension($this->file_path)."<br>";
		print "File Path = ".$this->getRealFilePath($this->file_path)."<br>";
		 
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
	function getRealFileSize($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return number_format($this->fs->GetFile($file_path)->Size,0,""," ");
	}
	/**
    *  File Type
    */
	function getRealFileType($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($file_path)->Type;
	}
	/**
    *  File Name
    */
	function getRealFileName($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($file_path)->Name;
	}
	/**
    *  File Path
    */
	function getRealFilePath($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFile($file_path)->Path;
	}
	/**
    *  File Extension (.exe,...)
    */
	function getRealFileExtension($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetExtensionName($file_path);
	}
	/**
    *  File Version
    */
	function getRealFileVersion($file_path)
	{
		$this->fs = $this->getFileSystOb();
		return $this->fs->GetFileVersion(realpath($file_path));
	}
 
 
 }