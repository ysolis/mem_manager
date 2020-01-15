<?php
class MemoryManager{
  private $buffer = '';
  private $size   = 0;
  private $free   = 0;
  private $index  = -1;
  private $alloc  = Array();


  function __construct($bytes)
  {
    $this->buffer = str_repeat(" ", $bytes);
    $this->size   = strlen($this->buffer);
    $this->free   = strlen($this->buffer);
  }
}

?>
