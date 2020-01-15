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

  function Position($index)
  {
    $result = 0;
    for($i=0; $i<$index; $i++){
      $result += $this->alloc[$i];
    }
    return $result;
  }

  function Store($index, $data)
  {}

  function Free($item)
  {}



}
?>
