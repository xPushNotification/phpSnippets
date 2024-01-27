<?php
//!---- (PHP): Вывод: Форматы: Проброс Картинок:

class ModelImg
{
    protected $nameOfFile = "default.jpg";
    protected $sizeOfFile;
    protected $handlerOfFile;
    protected $mimeOfFile;

    //* setters:
    function setNameOfFile(string $pnameOfFile)
    {
        $tempHandler = fopen($pnameOfFile, "rb");
        if($tempHandler)
        {
            if($this->handlerOfFile) {fclose($this->handlerOfFile);}
            $this->nameOfFile = $pnameOfFile;
            $this->handlerOfFile = $tempHandler;

            $this->sizeOfFile = getimagesize($this->nameOfFile);
            $this->mimeOfFile = $this->sizeOfFile["mime"];
            return;
        }
        throw new Exception("ModelImage:setNameOfFile:incorrect filename");

    } // m:setNameOfFile

    //* getters:
    function getHandlerOfFile()
    {
        if($this->handlerOfFile) {return $this->handlerOfFile;}
        throw new Exception("ModelImage:getHandlerOfFile:no handler exists");

    } //m:getHandlerOfFile

    function getMimeOfFile()
    {
        if($this->handlerOfFile) {return $this->mimeOfFile;}
        throw new Exception("ModelImage:getMimeOfFile:no handler exists");

    } //m:getMimeOfFile

    //* construct / destruct:
    function __construct($pparams = [])
    {
        $nameOfFile = $this->nameOfFile;
        if(isset($pparams["nameOfFile"])) if(gettype($pparams["nameOfFile"]) == "string") {$nameOfFile = $pparams["nameOfFile"];}

        $this->setNameOfFile($nameOfFile);

    } //m:__construct

    function __destruct()
    {
        if($this->handlerOfFile) {fclose($this->handlerOfFile);}

    } //m:__destruct

} //c: ModelImg

try
{
    $img = new ModelImg(["nameOfFile" => "test.jpg"]);
    header("Content-Type: {$img->getMimeOfFile}");
    fpassthru($img->getHandlerOfFile());        //!проброс
    exit;
}
catch(Exception $e)
{
    echo $e->getMessage();
    exit;
}
?>

