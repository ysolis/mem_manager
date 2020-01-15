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

  function Alloc($size)
  {
    if($size <= $this->free) {
      array_push($this->alloc, $size);
      $this->index++;
      $item = $this->alloc[$this->index];
      $this->free = $this->free - $size;

    } else {
      return false;
    }
  }

  function Free($item)
  {}

}
?>
