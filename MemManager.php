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

  function Free($index)
  {
    $pos   = $this->Position($index);
    $space = $this->alloc[$index];
    $new_buffer = substr($this->buffer, 0, $pos).substr($this->buffer, $pos+$space).str_repeat(' ', $space);
    $this->alloc[$index] = 0;
    $this->buffer = $new_buffer;
    $this->free += $space;
  }

  function ShowIndex($index)
  {
    $pos = $this->Position($index);
    $space = $this->alloc[$index];
    if($space>0) {
      print_r(substr($this->buffer, $pos, $space)."|\n");
    }
  }

  function ShowIndexes()
  {
    for($i=0; $i<=$this->index; $i++)
    {
      $this->ShowIndex($i);
    }
  }

  function ShowDiagnostic()
  {
    print_r($this->buffer."\n");
    print_r($this->size."\n");
    print_r($this->free."\n");
  }
}

$memory = new MemoryManager(100);

$n0 = $memory->Alloc(strlen('Yonsy'));
$memory->Store($n0, 'Yonsy');
$n1 = $memory->Alloc(10);
$memory->Store($n1, 'Solis');
$n2 = $memory->Alloc(10);
$memory->Store($n2, 'Ponce');

$memory->ShowIndexes();

$memory->Free($n1);

$memory->ShowIndexes();


?>
