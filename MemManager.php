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
      $this->free -= $size;
      return $this->index;
    } else {
      return false;
    }
  }

  function Position($index)
  {
    if($index <= $this->index)
    {
      $result = 0;
      for($i=0; $i<$index; $i++) {
        $result += $this->alloc[$i];
      }
      return $result;
    } else {
      return false;
    }
  }

  function Store($index, $data)
  {
    foreach (str_split($data) as $key => $value) {
      $this->buffer[$this->Position($index) + $key] = $value;
    }
  }

  function ShowBuffer()
  {
    print_r("\n".$this->buffer."\n");
    print_r(strlen($this->buffer));
  }

  function Free($index)
  {
    $space = $this->alloc[$index];
    $pos   = $this->Position($index);
    $this->alloc[$index] = 0;
    for($i=$index; $i<$this->index; $i++) {
    }
    $this->free += $space;
  }
}


$memory = new MemoryManager(100);

$n0 = $memory->Alloc(strlen('Yonsy'));
$memory->Store($n0, 'Yonsy');
$n1 = $memory->Alloc(10);
$memory->Store($n1, 'Solis');
$n2 = $memory->Alloc(20);
$memory->Store($n2, 'Ponce');

$memory->ShowBuffer();

?>
