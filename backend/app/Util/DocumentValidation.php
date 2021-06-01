<?php

namespace App\Util;

class DocumentValidation
{
	const LETRANIF='TRWAGMYFPDXBNJZSQVHLCKE';
	const LETRACIFINREGEX='ABCDEFGHJNPQRSUVW';

	private $document;

	function __construct($document) 
	{
    	$this->document=$document;
	}

	public function setDocument($document){
    	$this->document = $document;
  	}

    public function getDocument(){
        return $this->document;
    }

	function isFormatCorrectNIF()
    {
		$pattern = "/^\d{8}[".self::LETRANIF."]$/";
		return preg_match($pattern, strtoupper($this->document)); 

    }

    function isFormatCorrectNIE()
    {
		$pattern = "/^[XYZ]{1}\d{7}[".self::LETRANIF."]$/";
		return preg_match($pattern, strtoupper($this->document));//0 incorrect 1 is correct
    }

    function isFormatCorrectCIF()
    {
		$pattern = "/^[".self::LETRACIFINREGEX."]{1}\d{7}[a-zA-Z\d]$/";
		return preg_match($pattern, strtoupper($this->document));
    }
    
    function isNIF()
    {
    	if($this->isFormatCorrectNIF()){
    		return $this->calcularDigitControlNIF()==substr(strtoupper($this->document), -1);
    	}
    	return false;
    }

    function calcularDigitControlNIF()
    {
    	$num=substr($this->document, 0, -1);
    	$resto=$num%23;
    	return self::LETRANIF[$resto];
    }

    function isNIE()
    {
    	if($this->isFormatCorrectNIE()){
    		return $this->calcularDigitControlNIE()==substr(strtoupper($this->document), -1);
    	}
    	return false;
    }

    function calcularDigitControlNIE()
    {
    	$ptn = "/^[XYZ]/";
    	$rpltxt="0";
    	$nie=strtoupper($this->document);
    	if(str_starts_with($nie, "X")){
			$rpltxt="0";
		}else if(str_starts_with($nie, "Y")){
			$rpltxt="1";
		}else if(str_starts_with($nie, "Z")){
			$rpltxt="2";
		}
		$this->setDocument(preg_replace($ptn, $rpltxt, $nie));
    	return $this->calcularDigitControlNIF();
    }	
}
